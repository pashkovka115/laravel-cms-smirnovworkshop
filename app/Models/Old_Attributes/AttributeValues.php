<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValues extends Model
{
    use HasFactory;

    protected $table = 'attr_atributes_values';
    public $timestamps = false;
    protected $guarded = [];
}
