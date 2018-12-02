<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;
    const INACTIVE = 2, ACTIVE = 1;

    protected $fillable = [
    	'name',
        'url',
    	'image',
    	'description',
    	'status'
    ];

    /**
     * @param $query
     * @return Product|\Illuminate\Database\Query\Builder
     */

    public function scopeActive($query)
    {
        /** @var self $query */
        return $query->where('banners.status',self::ACTIVE);
    }

    public function scopeInActive($query)
    {
        /** @var self $query */
        return $query->where('banners.status', self::INACTIVE);
    }
}
