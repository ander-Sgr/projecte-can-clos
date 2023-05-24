<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function clothes()
    {
        return $this->hasOne(ClothesProduct::class);
    }

    public function book()
    {
        return $this->hasOne(BookProduct::class);
    }

    public function food()
    {
        return $this->hasOne(FoodProduct::class);
    }

    public function stockMovements()
    {
        return $this->hasMany(StockMovement::class);
    }
}
