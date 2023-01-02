<?php

namespace App\Http\Controllers;

use App\Models\Messages;

class MessagesController extends Controller {
    public function index() {
        $messages = Messages::orderBy('id', 'desc')->paginate(5);
        return view('pages.messages', compact('messages'));
    }

    public function show(Messages $message) {
        return view('pages.messages', compact('message'));
    }
}
