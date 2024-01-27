<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function readAll()
    {
        $shops = Shop::all();

        return response()->json([
            'data' => $shops
        ], 200);
    }

    public function readLimit()
    {
        $shops = Shop::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        if (count($shops) == 0) {
            return response()->json([
                'message'=> 'not found',
            ], 404);
        }

        return response()->json([
            'data' => $shops
        ], 200);
    }

    public function searchByCity($city)
    {
        $shops = Shop::where('city', 'LIKE','%'. $city .'%')
            ->orderBy('name')
            ->get();

        if (count($shops) == 0) {
            return response()->json([
                'message'=> 'not found',
            ], 404);
        }

        return response()->json([
            'data' => $shops
        ], 200);
    }
}
