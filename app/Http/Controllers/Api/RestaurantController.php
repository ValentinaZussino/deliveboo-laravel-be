<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {

        $restaurants = Restaurant::with('types')->get();
        return response()->json([
            'success' => true,
            'results' => $restaurants, 
        ]);
        
    }

    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with('plates')->first();
        if ($restaurant) {
            return response()->json([
                'success' => true,
                'results' => $restaurant
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'No such plate'
            ]);
        }
    }

    public function types()
    {

        $types = Type::all();
        return response()->json([
            'success' => true,
            'results' => $types
        ]);
    }

    public function categories()
    {

        $categories = Category::all();
        return response()->json([
            'success' => true,
            'results' => $categories

        ]);
    }



}


















?>