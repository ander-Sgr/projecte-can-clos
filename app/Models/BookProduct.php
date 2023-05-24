<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookProduct extends Model
{
    use HasFactory;
    protected $table = 'books_product';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
