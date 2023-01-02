<?php

namespace App\Http\Controllers;

use App\Models\Community;

class GroupController extends Controller {

    public function index()
    {
        return view('pages.group');
    }

    public function show(Community $group) {
        return view('pages.group', compact('group'));
    }
}
