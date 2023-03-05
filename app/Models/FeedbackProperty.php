<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackProperty extends Model
{
    use HasFactory;

    protected $table = 'feedback_properties';
    public $timestamps = false;
    protected $fillable = [
        'feedback_id',
        'key',
        'name',
        'type',
        'value',
        'is_show',
    ];
}
