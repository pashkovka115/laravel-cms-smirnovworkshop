<?php

namespace App\Models\Product\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'attr_options';
    protected $guarded = ['id'];
}
