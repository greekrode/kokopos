<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name', 'contact_person', 'address'
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
