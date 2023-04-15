<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Values extends Model
{
    use HasFactory;

    protected $table = 'attr_values';
    public $timestamps = false;
    protected $guarded = ['id'];


    public function values()
    {
        return $this->belongsToMany();
    }
}
