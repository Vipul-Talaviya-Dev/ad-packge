<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    const INACTIVE = 0, ACTIVE = 1;

    protected $fillable = [
        'category_id', 'name', 'slug', 'meta_keyword', 'meta_description', 'description', 'price', 'shipping_charge', 'qty', 'height_with_length', 'image', 'pack', 'piece', 'weight', 'prices_box', 'status'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function scopeActive($query)
    {
        return $query->where('products.status', self::ACTIVE);   
    }

    public function scopeInActive($query)
    {
        return $query->where('products.status', self::INACTIVE);   
    }

}
