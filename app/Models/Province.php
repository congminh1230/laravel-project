<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name_quan_huyen','type','matp'
    ];
    protected $primaryKey = 'matp';
    protected $table= 'devvn_quanhuyen';
}
