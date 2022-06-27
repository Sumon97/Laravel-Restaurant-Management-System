<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Item;
use App\Models\Menu;
use App\Models\Food;
use Auth;
use Carbon\Carbon;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('Sale.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        $items = Item::all();
        return view('Sale.create')->withItems($items)->withMenus($menus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            // Courier
            $sale = new Sale;
            $sale->manager_id   = Auth::guard('manager')->user()->id ?? null;
            $sale->customer     = $request->input('customer');
            $sale->phone        = $request->input('phone');
            $sale->sub_total    = $request->input('sub_total');
            $sale->tax          = $request->input('tax');
            $sale->amount       = $request->input('total_amount');

            $sale->save();




            $data = [];
            $item_id = $request->item_id;
            $name = $request->name;
            $price  = $request->price;
            $qty  = $request->qty;
            $total = $request->total;



            // it works on php 8.x

            for ($i = 0; $i < count((array)$name); $i++) {
             
            $data[] = [

            'sale_id' => $courier->id,
            'item_id' => $item_id[$i],
            'name' => $name[$i],
            'price' => $price[$i],
            'qty' => $qty[$i],
            'total' => $total[$i],
            'created_at' => now()->toDateTimeString(),
            ]; 
              }

              foreach($data as $food){
                Food::insert($food);
                }

            

        return redirect()->back()->with('success','Sale has been successfull');
    }
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
