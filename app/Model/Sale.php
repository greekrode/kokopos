<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = '$sales';

    protected $fillable = [
        'number', 'total'
    ];

    protected $guarded = [
        'id'
    ];

    public function salesdetails()
    {
        return $this->hasMany(SalesDetail::class);
    }
}
