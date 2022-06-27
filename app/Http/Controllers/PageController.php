<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
   
    public function front()
 {
  
      $foods = Item::all();
      $plate = Cart::where('session_id', '=', Session::getId())->sum('total');
      $carts = Cart::where('session_id', '=', Session::getId())->selectRaw('item_id, SUM(total) as total, count(item_id) as num')
          ->groupBy('item_id')
          ->get();
      return view('Page.front')->withFoods($foods)->withPlate($plate)->withCarts($carts);

    }

}
