<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackColumns extends General
{
    use HasFactory;

    protected $table = 'feedback_columns';
    public $timestamps = false;


    /*
     * Заглушка. Пока не используется.
     */
    public function properties()
    {
        return $this->hasMany(FeedbackProperty::class, 'feedback_id', 'feedback_id');
    }
}
