<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;
    protected $statusArr = [
        0 => 'Draft',
        1 => 'Public',
    ];
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_created_id',
        'user_updated_id',
        'category_id'
    ];

    public function getStatusTextAttribute() {
       return $this->statusArr[$this->status];
    }
    public function setTitleAttribute($title) {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }
    public function user() {
        return $this->belongsTo(User::class,'user_created_id');
    }
    public function userUpdate() {
        return $this->belongsTo(User::class,'user_updated_id');
    }
}
