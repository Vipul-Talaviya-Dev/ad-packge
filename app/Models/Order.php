<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'address_id', 'shipping_charge', 'gst', 'total_amount', 'cart_amount', 'payment_mode', 'payment_reference', 'payment_response', 'order_status', 'payment_status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function orderId()
	{
		return 'ADPACKING'.date('Ymd', strtotime($this->created_at)).$this->id;
	}

	public function orderProducts()
	{
		return $this->hasMany(OrderProduct::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
