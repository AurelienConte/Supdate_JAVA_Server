<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sarav\Multiauth\Foundation\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('Administration.login');
    }

    public function sendLogin(Request $request)
    {
      $USERNAME = $request->input('user_name');
      $PASSWORD = $request->input('password');

      if(\Auth::attempt("user", ['user_name' => $USERNAME, 'password' => $PASSWORD])) {
        return "YES";
      } else {
        return "NOP";
      }
    }
}
