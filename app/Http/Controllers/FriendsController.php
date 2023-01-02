<?php

namespace App\Http\Controllers;

use App\Models\Friends;

class FriendsController extends Controller {

    public function index() {
        $friends = Friends::orderBy('id', 'desc')->paginate(5);
        return view('pages.friends', compact('friends'));
    }
    public function show(Friends $friend) {
        return view('pages.friends', compact('friend'));
    }
}
