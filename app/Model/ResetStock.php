<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ResetStock extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'qty'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}

