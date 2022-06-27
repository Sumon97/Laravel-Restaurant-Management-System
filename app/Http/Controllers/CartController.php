<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


  public function index()
    {
       $carts = Cart::where('session_id', '=', Session::getId())->sum('total');
       return view('Inc.nav')->withCarts($carts);
    }
  
  public function store(Request $request)
    {
          $this->validate($request, [
            'item_id'  => 'required',
            'total'  => 'required',
           
        ]);


            // Create Ingredient
            $cart = new Cart;
            $cart->session_id = Session::getId();
            $cart->item_id = $request->input('item_id');
            $cart->total = $request->input('total');
            $cart->save();

         return redirect()->back()->with('success','You have successfully added new Food Item');
    }

    
}
