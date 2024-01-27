<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Laundry;
use Illuminate\Http\Request;

class LaundryController extends Controller
{
    public function readAll()
    {
        $laundries = Laundry::with('shop', 'user')->get();

        return response()->json([
            'data' => $laundries
        ], 200);
    }

    public function whereUserID($id)
    {
        $laundries = Laundry::where('user_id', $id)
            ->with('shop', 'user')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($laundries) == 0) {
            return response()->json([
                'message'=> 'not found',
            ], 404);
        }

        return response()->json([
            'data' => $laundries
        ], 200);
    }

    public function claim(Request $request)
    {
        $laundry = Laundry::where([
            ['id', '=', $request->id],
            ['claim_code', '=', $request->claim_code]
        ])->first();

        if (!$laundry) {
            return response()->json([
                'message'=> 'not found',
            ], 404);
        }

        $laundry->status = 'Proccess';
        $updated = $laundry->save();

        if ($updated) {
            return response()->json([
                'data' => $updated
            ], 200);
        }

        return response()->json([
            'message'=> 'can not be updated',
        ], 500);
    }
}
