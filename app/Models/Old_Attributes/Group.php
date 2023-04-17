<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'attr_groups';
    public $timestamps = false;
    protected $guarded = ['id'];


    public function attributes()
    {
        return $this->belongsToMany(
            Attributes::class,
            GroupAttribute::class,
            'attribute_id',
            'group_id'
        )->with('values');
    }
}
