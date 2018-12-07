<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'stock', 'product_id'
    ];

    protected $guarded = [
        'id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
