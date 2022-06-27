<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Item;
use App\Models\Cart;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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


        //$carts = Cart::where('session_id', '=', Session::getId())->sum('total');

         $carts = Cart::where('session_id', '=', Session::getId())->selectRaw('item_id, SUM(total) as total, count(item_id) as num')
          ->groupBy('item_id')
          ->get();

           $order = Order::create([
            'user_id' => auth()->user()->id,
            'total_amount' => $request->total_amount,
            'status' => $request->status,
            'table' => $request->table,
        ]);


      foreach ($carts as $cart) {
            
       
          $OrderItem = OrderItem::create([
            'order_id' => $order->id,
            'item_id' => $cart->Item->id,
            'quantity' => $cart->num,
            
        ]);

           
     

}

            $cart = Cart::where('session_id', '=', Session::getId());
            $cart->delete(); 
          return redirect()->back()->with('success','You have successfully Order your foods');

     







    
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


     public function cartdestroy($id)
    {
          $cart = Cart::find($id)->where('session_id', '=', Session::getId());
            $cart->delete();
    }
}
