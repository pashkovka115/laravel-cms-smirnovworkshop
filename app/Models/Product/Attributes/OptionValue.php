<?php

namespace App\Models\Product\Attributes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    use HasFactory;

    protected $table = 'attr_option_values';
    protected $guarded = ['id'];


    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
