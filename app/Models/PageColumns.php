<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageColumns extends General
{
    use HasFactory;

    protected $table = 'page_columns';
    public $timestamps = false;


    /*
     * Заглушка. Пока не используется.
     */
    public function properties()
    {
        return $this->hasMany(PageProperty::class, 'page_id', 'page_id');
    }
}
