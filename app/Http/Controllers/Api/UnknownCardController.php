<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\UnknownCard;
class UnknownCardController extends Controller
{
     public function store(Request $request)
    {
        $uid = $request->json('rfid2');

        Log::info('Unknown card UID received: ' . $uid);

        if (!$uid) {
            return response()->json(['message' => 'No RFID UID received'], 400);
        }

        // UID'yi doğrudan veritabanına kaydet
        UnknownCard::create([
            'uid' => $uid
        ]);

        return response()->json(['message' => 'Unknown card saved', 'uid' => $uid], 200);
    }
}
