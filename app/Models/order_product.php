<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    use HasFactory;
    public $table = "orders_products";
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price'
    ];
    public function orders()
    {
        return $this->belongsTo( Order::class);
    }
}
