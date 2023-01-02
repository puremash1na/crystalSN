<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;

class ContactInfoController extends Controller {
    public function index() {
        return view('pages.contactinfo');
    }
    public function show(ContactInfo $contactinfo) {
        return view('pages.contactinfo', compact('contactinfo'));
    }
}
