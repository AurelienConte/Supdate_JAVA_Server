<?php

namespace App\Http\Controllers\Administration;


use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;
use ErrorException;

class DashboardController extends Controller
{
    public function home(Request $request)
    {
      if(!$request->session()->has('creditentials'))
        return redirect()->route('login');

        $Settings_instance = new Settings();
        $Informations = $Settings_instance->Get();

        $folders = array_diff(scandir(public_path() . '\JAVA_UPDATER\files'), ['.', '..']);
        return view('Administration.dashboard', ['folders' => $folders, 'informations' => $Informations]);
    }

    public function home_p(Request $request)
    {
        $see = $request->input('see');
        $del = $request->input('del');

        if($see) {
          return redirect()->route('project_management', $see);
        } else if($del) {
          if($this->deleteDirectory(public_path() . '\JAVA_UPDATER\files\/' . $del))
          {
            if(file_exists(public_path() . '\JAVA_UPDATER\xml/' . $del . ".xml"))
              unlink(public_path() . '\JAVA_UPDATER\xml/' . $del . ".xml");
            return redirect()->route('dashboard')->with(['success' => 'Folder deleted !']);
          } else
            return redirect()->route('dashboard')->with(['error' => "This folder cannot be deleted !"]);
        } else {
          return redirect()->route('dashboard');
        }
    }
}