<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlateRequest;
use App\Http\Requests\UpdatePlateRequest;
use App\Models\Plate;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $restaurant = Restaurant::where('user_id',Auth::user()->id)->first();
        // dd($restaurant);
        $plates = Plate::where('restaurant_id', $restaurant->id)->get();
        // dd($plates);
        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.plates.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->validated();
        $data=$request->all();

        $restaurant = Restaurant::where('user_id',Auth::user()->id)->first();
        $slug = Plate::generateSlug($request->name, $restaurant->id);
        $data['slug'] = $slug;
        $data['restaurant_id'] = $restaurant->id;
        if($request->hasFile('image')){
            $path = Storage::put('images', $request->image);
            $data['image'] = $path;
        }

        $newPlate = Plate::create($data);
        return redirect()->route('admin.plates.show', $newPlate->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)

    {
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        $categories = Category::all();
        return view('admin.plates.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlateRequest $request, Plate $plate)
    {
        $data = $request->validated();
        $restaurant = Restaurant::where('user_id',Auth::user()->id)->first();
        $slug = Plate::generateSlug($request->name, $restaurant->id);
        $data['slug'] = $slug;
        $data['restaurant_id'] = $restaurant->id;
        if($request->hasFile('image')){
            if ($plate->image) {
                Storage::delete($plate->image);
            }

            $path = Storage::put('images', $request->image);
            $data['image'] = $path;
        }

        $updated = $plate->name;
        $plate->update($data);

        return redirect()->route('admin.plates.index')->with('message', "$updated updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $deleted = $plate->name;
        $plate->delete();
        return redirect()->route('admin.plates.index')->with('message', "$deleted deleted successfully");
    }
}
