<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    // use SoftDeletes;
    const STATUS_ACTIVE = 0;
    const STATUS_HOT = 3;
    protected $statusArr = [
        0 => 'Còn Hàng',
        1 => 'Hết Hàng',
        2 => 'Ngưng Bán',
        3 => 'Phiên Bản Giới Hạn'
    ];
    protected $table= 'products';
    protected $fillable = [
        'name',
        'slug',
    ];
    public function getStatusTextAttribute() {
        return $this->statusArr[$this->status];
         //     if($this->status == self::STATUS_SHOW ){
         //         $name = 'Public';
         //    }else{
         //         $name = 'Draft';
         //    }
         //    return $name;
     }
    public function setNameAttribute($name){
        $this -> attributes['name'] = $name;
        $this -> attributes['slug']= Str::slug($name);
    }
    public function category()
    {
        return $this->belongsTo(Category::class ,'category_id','id');
    }
    public function images(){
        return $this->belongsTo(Image::class,'product_id'); 
        // return $this->hasMany(Image::class,'id');
    }
    public function image(){
        return $this->hasOne(Image::class,'product_id');
    }
    public function user()
    {
        return $this->belongsTo( User::class,'user_created_id','id');
    }
    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price')->withTimestamps();
    }
    
}
