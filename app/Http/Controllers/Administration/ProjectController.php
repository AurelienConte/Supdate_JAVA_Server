<?php
/**
 * Created by PhpStorm.
 * User: aurelien.conte
 * Date: 17/10/2018
 * Time: 14:48
 */

namespace App\Http\Controllers\Administration;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function home($FOLDER_NAME)
    {
      $folders = array_diff(scandir(public_path() . '\JAVA_UPDATER\files/' . $FOLDER_NAME), ['.', '..']);
      return view('Administration.project', ['folders' => $folders, 'FOLDER_NAME' => $FOLDER_NAME]);
    }
}