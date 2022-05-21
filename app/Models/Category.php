<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table= 'categories';
    protected $fillable = [
        'name',
        'slug',
    ];
    public function setNameAttribute($name){
        $this -> attributes['name'] = $name;
        $this -> attributes['slug']= Str::slug($name);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class,'id');
    }
}
