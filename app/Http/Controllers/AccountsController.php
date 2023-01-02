<?php

namespace App\Http\Controllers;

use App\Models\Accounts;

class AccountsController extends Controller {
    public function index() {
        return view('pages.accounts');
    }
    public function show(Accounts $account) {
        return view('pages.accounts', compact('account'));
    }
}
