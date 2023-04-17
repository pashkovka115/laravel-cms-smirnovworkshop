<?php

namespace App\Models\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
