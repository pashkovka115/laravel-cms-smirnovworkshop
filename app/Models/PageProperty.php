<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageProperty extends Model
{
    use HasFactory;

    protected $table = 'page_properties';
    public $timestamps = false;
    protected $fillable = [
        'page_id',
        'key',
        'name',
        'type',
        'value',
        'is_show',
    ];
}
