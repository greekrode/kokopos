<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Product extends Model
{
    use Eloquence;

    protected $searchableColumns = ['name'];

    protected $fillable = [
        'name', 'selling_price', 'capital_price', 'stock', 'image', 'mime', 'original_image','category_id'
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
}
