<?php

namespace App\Http\Controllers;

use App\Models\RfidSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GetDataARController extends Controller
{
    public function getData(Request $request)
    {
        // Filtre değerlerini logla
        Log::info('Filter values:', $request->all());

        // Tüm kayıtları al
        $sessions = RfidSession::orderBy('created_at', 'desc')->get();

        // Filtreleme işlemini yap
        $filtered = $sessions->filter(function ($item) use ($request) {
            $person_Card = DB::table('cards')->where('uid', $item->rfid_personel)->first();
            $operation_Card = DB::table('cards')->where('uid', $item->rfid_operasyon)->first();

            $personMeta = $person_Card ? json_decode($person_Card->description, true) : [];
            $operationMeta = $operation_Card ? json_decode($operation_Card->description, true) : [];

            // Filtreleme her bir şart için loglanabilir
            if ($request->filled('line') && $request->line !== 'Bant') {
                $line = strtolower(trim($request->line));  // Küçük harfe çevir ve boşlukları temizle
                $operationMetaHat = strtolower(trim($operationMeta['hat'] ?? ''));
                
                Log::info('Checking line filter:', ['line' => $line, 'operationMeta_hat' => $operationMetaHat]);
                
                if ($operationMetaHat !== $line) {
                    Log::info('Line filter failed:', ['line' => $line]);
                    return false;
                }
            }
            

            if ($request->filled('productionOrder') && $request->productionOrder !== 'Üretim Sipariş No') {
                Log::info('Checking productionOrder filter:', ['productionOrder' => $request->productionOrder, 'item_production_order' => $item->production_order]);
                if ($item->production_order !== $request->productionOrder) {
                    Log::info('Production Order filter failed:', ['productionOrder' => $request->productionOrder]);
                    return false;
                }
            }

            if ($request->filled('customerOrder') && $request->customerOrder !== 'Müşteri Sipariş No') {
                Log::info('Checking customerOrder filter:', ['customerOrder' => $request->customerOrder, 'item_customer_order' => $item->customer_order]);
                if ($item->customer_order !== $request->customerOrder) {
                    Log::info('Customer Order filter failed:', ['customerOrder' => $request->customerOrder]);
                    return false;
                }
            }

            if ($request->filled('modelCode') && $request->modelCode !== 'Model Kodu') {
                Log::info('Checking modelCode filter:', ['modelCode' => $request->modelCode, 'item_model_code' => $item->model_code]);
                if ($item->model_code !== $request->modelCode) {
                    Log::info('Model Code filter failed:', ['modelCode' => $request->modelCode]);
                    return false;
                }
            }

            if ($request->filled('product') && $request->product !== 'Ürün') {
                Log::info('Checking product filter:', ['product' => $request->product, 'item_product' => $item->product]);
                if ($item->product !== $request->product) {
                    Log::info('Product filter failed:', ['product' => $request->product]);
                    return false;
                }
            }

            if ($request->filled('date')) {
                Log::info('Checking date filter:', ['date' => $request->date, 'item_created_at' => $item->created_at->format('Y-m-d')]);
                if ($item->created_at->format('Y-m-d') !== $request->date) {
                    Log::info('Date filter failed:', ['date' => $request->date]);
                    return false;
                }
            }

            return true;
        });

        // Filtrelenmiş verileri logla
        Log::info('Filtered data count:', ['count' => $filtered->count()]);

        // Veriyi formatla
        $mappedData = $filtered->map(function ($item) {
            $person_Card = DB::table('cards')->where('uid', $item->rfid_personel)->first();
            $operation_Card = DB::table('cards')->where('uid', $item->rfid_operasyon)->first();
            $bundle_Card = DB::table('cards')->where('uid', $item->rfid_demet1)->first();

            $personMeta = $person_Card ? json_decode($person_Card->description, true) : [];
            $operationMeta = $operation_Card ? json_decode($operation_Card->description, true) : [];
            $bundleMeta = $bundle_Card ? json_decode($bundle_Card->description, true) : [];

            return [
                'date' => $item->created_at->format('Y-m-d'),
                'device_id' => $item->device_id,
                'line' => $operationMeta['hat'] ?? 'Hat Gelmedi',
                'productionOrder' => $item->production_order ?? '1475896',
                'customerOrder' => $item->customer_order ?? '3434',
                'modelCode' => $item->model_code ?? '544095/ELYON',
                'product' => $item->product ?? 'ELYON',
                'operator' => isset($personMeta['ad']) ? $personMeta['ad'] . ' ' . $personMeta['soyad'] : 'Ad Hata',
                'operation' => $operationMeta['operasyon'] ?? 'Operasyon Gelmedi',
                'quantity' => $item->rfid_demet1 ?? 0,
            ];
        });

        // Dönüşü JSON formatında ver
        return response()->json($mappedData->values());
    }
}
