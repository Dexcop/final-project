<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'total', 'image', 'category_id'];


    public function category()
    {/* The line `return ->belongsTo(Category::class);` in the `Item` model is defining a
    relationship between the `Item` model and the `Category` model in Laravel's Eloquent ORM. */
    
        return $this->belongsTo(Category::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function receipts()
    {
        return $this->belongsToMany(Receipt::class)->withPivot('total_items');
    }
}
