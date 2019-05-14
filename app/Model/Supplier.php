<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
