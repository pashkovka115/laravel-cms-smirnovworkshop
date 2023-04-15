<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    use HasFactory;

    protected $table = 'attr_items_groups';
    public $timestamps = false;
    protected $guarded = ['id'];
}
