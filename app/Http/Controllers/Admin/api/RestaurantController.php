<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurants;


class RestaurantsController extends Controller
{

    public function index(Request $request)
    {
        $restaurants = Restaurant::all();
        return response()->json([
            'status' => 'success',
            'results' => $restaurants

        ]);
    }

    public function show($slug)
    {
        $restaurant = Restautant::where('slug', $slug)->with('plates')->first();
        if ($restaurant) {
            return response()->json([
                'status' => 'success',
                'results' => $restaurant->plates
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Restaurant not found'
            ]);
        }
    }

    public function types()
    {
        $types = Type::all();
        return response()->json([
            'status' => 'success',
            'results' => $types
        ]);

    }

    public function categories(){
        $categories = Category::all();
        return response()->json([
           'status' =>'success',
           'results' => $categories
        ]);

    }

}
























?>