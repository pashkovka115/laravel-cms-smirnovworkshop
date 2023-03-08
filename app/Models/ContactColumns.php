<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactColumns extends General
{
    use HasFactory;

    protected $table = 'contacts_columns';
    public $timestamps = false;


    /*
     * Заглушка. Пока не используется.
     */
    public function properties()
    {
        return $this->hasMany(ContactProperty::class, 'contact_id', 'contact_id');
    }
}
