<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {   
        $restaurant = Restaurant::where('user_id',Auth::user()->id)->first();
        if ($restaurant) {
            return view('admin.restaurants.index', compact('restaurant'));
        }else{
            abort(404);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * 
     */
    public function create()
    {
        if(Restaurant::where('user_id',Auth::user()->id)->exists()){
            abort(403);
        } else {
            $types = Type::all();
            return view('admin.restaurants.create', compact('types')); 
        }
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        
        $data['user_id'] = Auth::user()->id;
        
        $slug = Restaurant::generateSlug($request->name);
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            $path = Storage::putFile('images', $request->file('image'));
            $data['image'] = $path;
        }
        
        
        $newRestaurant = Restaurant::create($data);

        if ($request->has('types')) {
            $newRestaurant->types()->attach($request->types);
        }

        

        return redirect()->route('admin.restaurants.index')->with('message', "$newRestaurant->name creato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function show(Restaurant $restaurant)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    public function edit(Restaurant $restaurant)
    {
        $ristorante = Restaurant::where('user_id',Auth::user()->id)->first();
        if(!$ristorante){
            abort(403);
        }else if ($ristorante->id !== $restaurant->id) {
            abort(403);
        }
        $types = Type::all();
        return view('admin.restaurants.edit', compact('types','restaurant')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * 
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        // dd($restaurant);
        
        $data = $request->validated();
        
        $slug = Restaurant::generateSlug($request->name);
        $data['slug'] = $slug;

        if ($request->hasFile('image')) {
            if($restaurant->image){
                Storage::delete($restaurant->image);
            }
            $path = Storage::put('images',$request->image);
            $data['image'] = $path;
        }
        $restaurant->update($data);

        if ($request->has('types')) {
            $restaurant->types()->sync($request->types);
        } else {
            $restaurant->types()->attach($request->types);
        }
        return redirect()->route('admin.restaurants.index')->with('message', "$restaurant->name aggiornato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function destroy(Restaurant $restaurant)
    {
        if($restaurant->image){
            Storage::delete($restaurant->image);
        }

        $restaurant->delete();
        return redirect()->route('admin.restaurants.index')->with('message', "$restaurant->name cancellato con successo");
    }
}
