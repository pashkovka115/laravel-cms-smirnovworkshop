<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactProperty extends Model
{
    use HasFactory;

    protected $table = 'contacts_properties';
    public $timestamps = false;
    protected $fillable = [
        'contact_id',
        'key',
        'name',
        'type',
        'value',
        'is_show',
    ];
}
