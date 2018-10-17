<?php
/**
 * Created by PhpStorm.
 * User: aurelien.conte
 * Date: 17/10/2018
 * Time: 11:40
 */

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
      try {
        $Instance = new Users();
        if($Instance->GetAll() != null) {
          if($request->session()->get('creditentials') != null)
            return redirect()->route('dashboard');
          else
            return redirect()->route('login');
        }
      } catch (QueryException $e) {
          return redirect()->route('g_step');
      }
    }
}