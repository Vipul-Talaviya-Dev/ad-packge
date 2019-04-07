<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeProduct extends Model
{
    use SoftDeletes;
    const INACTIVE = 2, ACTIVE = 1;

    protected $fillable = [
        'category_id',
    	'name',
    	'image',
    	'status'
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
	
    /**
     * @param $query
     * @return Product|\Illuminate\Database\Query\Builder
	*/

    public function scopeActive($query)
    {
        /** @var self $query */
        return $query->where('home_products.status',self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        /** @var self $query */
        return $query->where('home_products.status', self::INACTIVE);
    }    
}
