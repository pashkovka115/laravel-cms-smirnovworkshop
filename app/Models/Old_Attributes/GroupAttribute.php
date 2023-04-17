<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupAttribute extends Model
{
    use HasFactory;

    protected $table = 'attr_group_attribute';
    public $timestamps = false;
    protected $guarded = [];
}
