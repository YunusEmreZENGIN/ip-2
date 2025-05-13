<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\CardType;
use App\Models\RfidSession;
use App\Models\VerimIzleme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RfidController extends Controller
{
    public function store(Request $request)
    {
        $rfid_uid = $request->json('rfid');
        Log::info('RFID UID received: ' . $rfid_uid);
        $device_id = $request->json('device_id');
        Log::info('New Operation Session Started without Personnel RFID!');


        if (!$rfid_uid || !$device_id) {
            return response()->json(['message' => 'No RFID UID received or not Device İd'], 400);
        }

        $card = Card::where('uid', $rfid_uid)->first();

        if (!$card) {
            return response()->json(['message' => 'Unrecognized Card UID'], 404);
        }

        $session = RfidSession::where('device_id', $device_id)->latest()->first();

        switch ($card->type->slug) {
            case 'person':
                $session = new RfidSession();
                $session->rfid_personel = $rfid_uid;
                $session->device_id = $device_id;
                $session->save();
                return response()->json(['message' => 'Personel Kartı Okutuldu. Operasyon Kartını Okutabilirsiniz...']);

            case 'operation':
                if ($session && !$session->rfid_operasyon) {
                    $session->rfid_operasyon = $rfid_uid;
                    $session->save();
                    return response()->json(['message' => 'Operasyon Kartı Okutuldu. Demet Kartını Okutabilirsiniz...']);
                } else {
                    $newSession = new RfidSession();
                    $newSession->rfid_personel = $session->rfid_personel ?? null;
                    $newSession->rfid_operasyon = $rfid_uid;
                    $newSession->device_id = $device_id;
                    $newSession->save();
                    return response()->json(['message' => 'Yeni Operasyon Kartı okutuldu. Yeni oturum başlatıldı.']);
                }

            case 'bundle':
                if ($session && $session->rfid_personel && $session->rfid_operasyon) {
                    $session->rfid_demet1 += 50;
                    $session->save();



                    return response()->json(['message' => 'Adet +50']);
                } else {
                    return response()->json(['message' => 'Eksik bilgi! Önce personel ve operasyon kartını okutun.']);
                }

            default:
                return response()->json(['message' => 'Tanımsız kart tipi']);
        }
    }
    
    private function saveVerimIzleme($session)
    {
        $verimIzleme = new VerimIzleme();
        $verimIzleme->line = $session->rfid_operasyon;
        $verimIzleme->persNo = $session->rfid_personel;
        $verimIzleme->persAdi = 'Personel Adı';
        $verimIzleme->persSoyadi = 'Personel Soyadı';
        $verimIzleme->gunSure = 0;
        $verimIzleme->gerceklesenDakika = 0;
        $verimIzleme->kayipDakika = 0;
        $verimIzleme->kisiselVerimlilik = 0;
        $verimIzleme->isletmeyeKatkıverimlilik = 0;
        $verimIzleme->personelGorevi = 'operator';
        $verimIzleme->save();
    }
}
