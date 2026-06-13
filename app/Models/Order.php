<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'product_id',
        'quantity',
        'total_price',
        'status',
        'payment_status',
        'shipping_address',
        'billing_address',
    ];

    // ✅ ADD THIS - An order belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // An order belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // An order has many items (if you use OrderItem)
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Accessor for total_amount (to match dashboard)
    public function getTotalAmountAttribute()
    {
        return $this->total_price;
    }
}