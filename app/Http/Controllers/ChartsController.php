<?php

namespace App\Http\Controllers;

use App\Models\RoverModel;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function showCharts()
    {
        $rovers = RoverModel::all();
        $effiencyData = $rovers->map(function ($item) {
            return [
                'x' => 'Bant' . $item->id,
                'y' => $item->effiency,
            ];
        })->toArray();

        return view('layouts.anaekran', [
            'rovers' => $rovers,
            'effiencyData' => $effiencyData,
            'adetValue' => $rovers->sum('processed_units'),
            'qualityValue' => round($rovers->avg('quality'), 2),
            'effiencyValue' => round($rovers->avg('effiency'), 2),
        ]);
    }

    public function calculateAdetPercentage(Request $request)
    {
        $expectedTotal = $request->input('expectedTotal', 6000);
        $rovers = RoverModel::all();

        $processedTotal = $rovers->sum('processed_units');
        $adetPercentage = $expectedTotal > 0 ? (($processedTotal / $expectedTotal) * 100) : 0;

        return response()->json([
            'processedTotal' => $processedTotal,
            'expectedTotal' => $expectedTotal,
            'adetPercentage' => round($adetPercentage, 2),
        ]);
    }
}
