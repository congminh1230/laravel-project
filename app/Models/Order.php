<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $statusArr = [
        '1'=>'Đã đặt hàng', 
        '2'=>'Đơn hàng đã được xác nhận',
        '3'=>'Đang vận chuyển',
        '4'=>'Đã giao hàng',
        '5'=>'Đơn hàng bị hủy'
    ];
    public function getStatusTextAttribute(){
        return $this->statusArr [$this->status];
    }
    public function user(){
        return $this-> belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price')->withTimestamps();
    }
}
