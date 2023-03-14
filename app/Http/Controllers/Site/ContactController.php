<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $page_item = Contact::with('properties')->where('is_show', true)->firstOrFail();

        return view('site.contact.show', compact('page_item'));
    }
}
