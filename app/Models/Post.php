<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Post extends Model
{
    use HasFactory;
    protected $table= 'posts';
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
        //     if($this->status == self::STATUS_SHOW ){
        //         $name = 'Public';
        //    }else{
        //         $name = 'Draft';
        //    }
        //    return $name;
    }
    public function setTitleAttribute($title) {
        $this->attributes['title'] = $title;
        $this->attributes['slug'] = Str::slug($title);
    }
    public function category()
    {
        return $this->belongsTo( Category::class ,'category_id');
    }

    public function user()
    {
        return $this->belongsTo( User::class,'user_created_id','id');
    }

    // public function userUpdate(){
    //     return $this->belongsTo(User::class, 'user_updated_id');
    // }


    public function tags()
    {
        return $this->belongsToMany( Tag::class );
    }
}
