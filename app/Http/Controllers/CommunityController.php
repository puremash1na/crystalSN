<?php

namespace App\Http\Controllers;

use App\Models\Community;

class CommunityController extends Controller {
    public function index() {
        $community = Community::orderBy('id', 'desc')->paginate(5);
        return view('pages.community', compact('community'));
    }
    public function show(Community $communite) {
        return view('pages.community', compact('communite'));
    }
}
