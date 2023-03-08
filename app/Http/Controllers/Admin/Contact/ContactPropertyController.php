<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Admin\Abstracts\AdminController;
use App\Models\ContactProperty;
use Illuminate\Http\Request;

class ContactPropertyController extends AdminController
{
    const FOREIGN_FIELD = 'contact_id';
    const MODEL = ContactProperty::class;
    const TABLE = 'contacts_properties';


    public function store(Request $request){
        return parent::store($request);
    }
}
