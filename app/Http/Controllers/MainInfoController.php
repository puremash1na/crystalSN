<?php

namespace App\Http\Controllers;

use App\Models\MainInfo;

class MainInfoController extends Controller {

    public function index() {
        return view('pages.maininfo');
    }

    public function show(MainInfo $maininfo) {
        return view('pages.maininfo', compact('maininfo'));
    }
}
