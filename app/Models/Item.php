<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;




 
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }


     public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }

}
