<?php

namespace App\Http\Controllers;

use App\Models\Messages;

class DialogController extends Controller {
    public function index() {
        return view('pages.dialog');
    }
    public function show(Messages $dialog) {
        return view('pages.dialog', compact('dialog'));
    }
}
