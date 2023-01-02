<?php

namespace App\Http\Controllers;

use App\Models\Publications;

class PublicationsController extends Controller {

    public function index() {
        return view('pages.publications');
    }

    public function show(Publications $publication) {
        return view('pages.publications', compact('publication'));
    }
}
