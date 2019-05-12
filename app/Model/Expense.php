<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'product_id', 'price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeInfo($query)
    {
        return $query->with('product');
    }
}
