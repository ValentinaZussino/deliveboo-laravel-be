<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\plate;

class plateController extends Controller
{
    public function index()
    {
        $plates = Plate::all();
        return response()->json([
            'success' => true,
            'results' => $plates
        ]);
    }

    public function show($slug)
    {
        $plates = plate::with('type', 'order', 'restaurant')->where('slug', $slug)->first();

        if ($plates) {
            return response()->json([
                'success' => true,
                'results' => $plates
            ]);
        } else
            return response()->json([
                'success' => false,
                'results' => 'Nessun piatto disponibile'
            ]);
    }
}