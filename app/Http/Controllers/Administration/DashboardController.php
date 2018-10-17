<?php

namespace App\Http\Controllers\Administration;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(Request $request)
    {
      if(!$request->has('creditentials'))
        return redirect()->route('login');
    }

    public function home(Request $request)
    {
        $folders = array_diff(scandir(public_path() . '\JAVA_UPDATER\files'), ['.', '..']);
        return view('Administration.dashboard', ['folders' => $folders]);
    }

    public function home_p(Request $request)
    {
        $see = $request->input('see');
        $del = $request->input('del');

        if($see) {
          return redirect()->route('project_management', $see);
        } else if($del) {
          if(rmdir(public_path() . '\JAVA_UPDATER\files\/' . $del))
          {
            unlink(public_path() . '\JAVA_UPDATER\xml\/' . $del . '.xml');
            return redirect()->route('dashboard')->with(['success' => 'Folder deleted !']);
          } else
            return redirect()->route('dashboard')->with(['error' => "This folder cannot be deleted !"]);
        } else {
          return redirect()->route('dashboard');
        }
    }
}