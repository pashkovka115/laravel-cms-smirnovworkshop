<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageImages extends Model
{
    use HasFactory;

    protected $table = 'pages_images';
    public $timestamps = false;
    protected $guarded = ['id'];
}
