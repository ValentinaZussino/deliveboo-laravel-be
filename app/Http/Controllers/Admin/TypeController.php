<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $types = Type::all();
        $types = Type::get()->toQuery()->paginate(15);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
        //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function store(StoreTypeRequest $request)
    {
        $val = $request->validated();
        $slug = Type::generateSlug($request->name);
        $val['slug'] = $slug;

        Type::create($val);

        return redirect()->back()->with('message', "Type $slug added successfully");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * 
     */
    // public function show($id)
    // {
        //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * 
     */
    // public function edit($id)
    // {
        //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $val_data = $request->validated();
        $slug = Type::generateSlug($request->name);
        $val_data['slug'] = $slug;
        $type->update($val_data);

        return redirect()->back()->with('message', "Type $slug updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function destroy(Type $type)
    {
        // $type->delete(); 
        // return redirect()->back()->with('message', "Type $type->name removed successfully");
    }
}
