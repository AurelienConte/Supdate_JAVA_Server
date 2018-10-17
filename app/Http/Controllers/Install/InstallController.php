<?php

namespace App\Http\Controllers\Install;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Users;
use Illuminate\Support\Facades\Hash;

class InstallController extends Controller
{
  public function getStep(Request $request)
  {
      Artisan::call('migrate', array('--force' => true));
      return view('Install.step');
  }

  public function setStep(Request $request)
  {
        Artisan::call('migrate', array('--force' => true));
        $USERNAME = $request->input('USERNAME');
        $PASSWORD = $request->input('PASSWORD');

        $Instance = new Users();
        Hash::check('secret', '$2y$10$sgeQdkWO7XTo5oN0OKu8ZesBeAP3jKGikidfPgLARMzpAx/CHu4LS');
        $Instance->Store(['user_name' => $USERNAME, 'password' => Hash::make($PASSWORD)]);
        return redirect()->route('login');
  }
}
