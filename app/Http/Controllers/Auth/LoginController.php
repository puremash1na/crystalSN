<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Auth;
use Cache;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        $expiresAt = Carbon::now()->addMinutes(5);
        DB::table("users")
            ->where("id", $user->id)
            ->update(["status" => 1]);
        Cache::put('user-is-online-' . $user->id, true, $expiresAt);
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        DB::table("users")
            ->where("id", auth()->user()->id)
            ->update(["status" => 0]);
        Cache::forget('user-is-online-' . Auth::user()->id);
        Auth::logout();
        return redirect('');
    }
}
