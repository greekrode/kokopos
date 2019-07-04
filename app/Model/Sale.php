<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'number', 'total', 'customer_id', 'user_id'
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeInfo($query)
    {
        return $query->with('customer', 'user');
    }
}
