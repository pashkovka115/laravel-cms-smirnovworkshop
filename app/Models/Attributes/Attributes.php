<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;

    protected $table = 'attr_atributes';
    public $timestamps = false;
    protected $guarded = ['id'];


    public function values()
    {
        return $this->belongsToMany(
            Values::class,
            AttributeValues::class,
            'value_id',
            'attribute_id'
        );
    }
}
