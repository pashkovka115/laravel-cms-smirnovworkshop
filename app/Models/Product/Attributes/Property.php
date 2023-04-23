<?php

namespace App\Models\Product\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'attr_properties';
    protected $guarded = ['id'];
}
