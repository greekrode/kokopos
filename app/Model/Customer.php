<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'phone_number'
    ];

    public function sales() {
        return $this->hasMany(Sale::class);
    }
}
