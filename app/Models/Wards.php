<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name_xa_huyen','type','matp'
    ];
    protected $primaryKey = 'xaid';
    protected $table= 'devvn_xaphuongthitran';
}
