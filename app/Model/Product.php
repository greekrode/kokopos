<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Product extends Model
{
    use Eloquence;

    protected $searchableColumns = ['name'];

    protected $fillable = [
        'name', 'selling_price', 'capital_price', 'image', 'mime', 'original_image','category_id'
    ];

    protected $guarded = [
        'id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function salesdetails()
    {
        return $this->hasMany(SalesDetail::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function resetStocks()
    {
        return $this->hasMany(ResetStock::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function scopeInfo($query)
    {
        return $query->with('category', 'stock');
    }
}
