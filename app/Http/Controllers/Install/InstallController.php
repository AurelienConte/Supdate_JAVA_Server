<?php

namespace App\Http\Controllers\Install;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Artisan;
use App\Users;
use Hash;

class InstallController extends Controller
{
  public function getStep(Request $request)
  {
      return view('Install.step1');
  }

  public function setStep(Request $request)
  {
      $step = $request->input('_step');

      if($step == 1) {
        $DB_HOST = $request->input('DB_HOST');
        $DB_PORT= $request->input('DB_PORT');
        $DB_DATABASE= $request->input('DB_INFO');
        $DB_USERNAME = $request->input('DB_USERNAME');
        $DB_PASSWORD = $request->input('DB_PASS');

        config(['database.connections.mysql.host' => $DB_HOST]);
        config(['database.connections.mysql.port' => $DB_PORT]);
        config(['database.connections.mysql.database' => $DB_DATABASE]);
        config(['database.connections.mysql.username' => $DB_USERNAME]);
        config(['database.connections.mysql.password' => $DB_PASSWORD]);

        Artisan::call('migrate', array('--force' => true));
        return view('Install.step2');
      } else if($step == 2) {
        $USERNAME = $request->input('USERNAME');
        $PASSWORD = $request->input('PASSWORD');

        $Instance = new Users();
        $Instance->Store(['user_name' => $USERNAME, 'password' => Hash::make($PASSWORD)]);
        return redirect()->route('login');
      }
  }
}
