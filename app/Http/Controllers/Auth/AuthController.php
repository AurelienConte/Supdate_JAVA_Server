<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(Request $request)
    {
      if($request->has('creditentials'))
        return redirect()->route('dashboard');
    }

    public function getLogin()
    {
        return view('Administration.login');
    }

    public function sendLogin(Request $request)
    {
      $USERNAME = $request->input('user_name');
      $PASSWORD = $request->input('password');
      $Instance = new Users();

      Hash::check('secret', '$2y$10$sgeQdkWO7XTo5oN0OKu8ZesBeAP3jKGikidfPgLARMzpAx/CHu4LS');
      if($Instance->Exist(['user_name' => $USERNAME])) { //search for user
        $User = $Instance->Get(['user_name' => $USERNAME]); //get user info
        if(Hash::check($PASSWORD, $User[0]->password)) //check if password match with hash
        {
          $request->session()->put('creditentials', $User[0]);
          return redirect()->route('dashboard');
        }
        else
          return redirect()->route('login')->with(['error' => 'Bad Creditentials']);
      } else {
        return redirect()->route('login')->with(['error' => 'Bad Creditentials']);
      }
    }

    public function Logout(Request $request)
    {
      $request->session()->forget('creditentials');
      return redirect()->route('login');
    }
}
