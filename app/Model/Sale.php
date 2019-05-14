<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'number', 'total', 'customer_id'
    ];

    protected $guarded = [
        'id'
    ];

    public function salesdetails()
    {
        return $this->hasMany(SalesDetail::class, 'sales_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function scopeInfo($query)
    {
        return $query->with('customer');
    }
}
