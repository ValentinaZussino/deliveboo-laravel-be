<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;
use App\Models\Order;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $restaurant = Restaurant::where('user_id',Auth::user()->id)->first();
        if($restaurant){
            $restaurant_id = Auth::user()->restaurant->id;

            $total = Order::whereHas(
                'plates',
                function ($query) use ($restaurant_id) {
                    $query->where('restaurant_id', $restaurant_id);
                }
            )
                ->join('order_plate', 'orders.id', '=', 'order_plate.order_id')
                ->selectRaw('DATE(orders.date) as date, SUM(orders.total_amount) as total')
                ->groupBy('date')
                ->get();

            return view('admin.dashboard', compact('restaurant','total'));
            
        }else{
            $types = Type::all();
            return redirect()->route('admin.restaurants.create', compact('types'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
