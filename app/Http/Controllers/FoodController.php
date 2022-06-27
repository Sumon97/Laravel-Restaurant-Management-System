<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Menu;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $menus = Menu::all();
       return view('Food.index')->withMenus($menus);
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
        $this->validate($request, [
            'name'  => 'required',
            'photo'  => 'required|max:1024',
            'description'  => 'required',
            'price'  => 'required',
            'menu_id'  => 'required',
        ]);


            //handle file upolad
            if($request->hasFile('photo')){
                //get filename with the extension
                $filenameWithExt = $request->file('photo')->getClientOriginalName();
                // GET just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just ext
                $extension = $request->file('photo')->getClientOriginalExtension();
                //filename to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload image
                $path = $request->file('photo')->storeAs('public/food', $fileNameToStore);

            } else {
                $fileNameToStore = 'food.jpg';
            }



            // Create Food Item
            $food = new Item;
            $food->name = $request->input('name');
            $food->photo = $fileNameToStore;
            $food->description = $request->input('description');
            $food->price = $request->input('price');
            $food->menu_id = $request->input('menu_id');
            $food->save();

        return redirect()->back()->with('success','You have successfully added new Food Item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Item::find($id);
        return view('Food.show')->with('food', $food);
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
