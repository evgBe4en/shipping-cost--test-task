<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use App\Services\PriceCalculator;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        return response()->json(Carrier::all());
    }
    public function showPrice(Request $request)
    {
        $carrier = Carrier::where('slug', $request->carrier_slug)->first();

        if(!$carrier) {
            return response()->json(['message' => 'Carrier not found'], 404);
        }

        try {
            $price = PriceCalculator::calculate(
                $carrier,
                $request->weight
            );
        } catch (\Exception $e) {
            return response()->json(['error' => 'Calculation failed'], 500);
        }

        return response()->json([
            'price' => $price
        ]);
    }
}
