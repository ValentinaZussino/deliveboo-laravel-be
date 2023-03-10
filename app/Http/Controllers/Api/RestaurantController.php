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

    // old filter
    // public function filterRestaurants(Request $request){
    //     if ($request->has('type_id')) {
    //         $restaurants = Restaurant::whereHas('types', function($query) use ($request) {
    //             $query->where('type_id', $request->type_id);
    //         })->get();
    //         return response()->json([
    //             'success' => true,
    //             'results' => $restaurants
    //         ]);
    //     }else {
    //         return response()->json([
    //             'success' => false,
    //             'results' => 'Not foundddd'
    //         ]);
    //     }
    // }


    public function filterRestaurants(Request $request) {
        $type_ids = $request->input('type_id', []);
        $restaurants = Restaurant::where(function ($query) use ($type_ids) {
            foreach ($type_ids as $type_id) {
                $query->orWhereHas('types', function ($subquery) use ($type_id) {
                    $subquery->where('type_id', $type_id);
                });
            }
        })->get();
    
        if ($restaurants->isEmpty()) {
            return response()->json([
                'success' => false,
                'results' => 'Not found'
            ]);
        }
    
        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}


















?>