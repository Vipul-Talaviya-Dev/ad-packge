<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_id', 'user_id', 'address_id', 'product_id', 'price', 'qty', 'order_status'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function product()
	{
		return $this->belongsTo(Product::class);
	}

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
