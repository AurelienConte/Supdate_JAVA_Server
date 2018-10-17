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
use DCarbone\XMLWriterPlus;

class ProjectController extends Controller
{

    public function home(Request $request, $FOLDER_NAME)
    {
      if(!$request->session()->has('creditentials'))
        return redirect()->route('login');
      $folders = array_diff(scandir(public_path() . '\JAVA_UPDATER\files/' . $FOLDER_NAME), ['.', '..']);
      return view('Administration.project', ['folders' => $folders, 'FOLDER_NAME' => $FOLDER_NAME]);
    }

    public function gen_xml(Request $request)
    {
        $SELECTED = $request->input('SELECTED');
        $EXTRACT = $request->input('EXTRACT');
        $FOLDER = $request->input('FOLDER');

        if(!$SELECTED)
          return redirect()->route('project_management', $FOLDER)->with(['error' => 'No file selected !']);

        $xmlWriterPlus = new XMLWriterPlus();
        $xmlWriterPlus->openMemory();
        $xmlWriterPlus->startDocument();

        $xmlWriterPlus->writeComment('File provided by aurelien conte :)');
        $xmlWriterPlus->startElement('content');

        //Generate configuration part :)
        $xmlWriterPlus->startElement('configuration');
        $xmlWriterPlus->writeElement('folder', $FOLDER);
        $xmlWriterPlus->endElement();

        //generate file balise
        foreach ($SELECTED as $item) {
          $xmlWriterPlus->startElement('file');
          $xmlWriterPlus->writeElement('name', $item);
          $xmlWriterPlus->writeElement('md5', md5_file(public_path() . '\JAVA_UPDATER\files/' . $FOLDER . "/" . $item));
          if(isset($EXTRACT)) {
            $found = false;
            foreach ($EXTRACT as $element) {
              if($item == $element)
                $found = true;
            }
            if($found)
              $xmlWriterPlus->writeElement('extract', 'true');
            else
              $xmlWriterPlus->writeElement('extract', 'false');
          } else {
            $xmlWriterPlus->writeElement('extract', 'false');
          }
          $xmlWriterPlus->endElement();
        }

        //close document
        $xmlWriterPlus->endElement();
        $xmlWriterPlus->endDocument();

        if(file_exists(public_path() . '\JAVA_UPDATER\xml/' . $FOLDER . ".xml"))
          unlink(public_path() . '\JAVA_UPDATER\xml/' . $FOLDER . ".xml");
        file_put_contents(public_path() . '\JAVA_UPDATER\xml/' . $FOLDER . ".xml", $xmlWriterPlus->outputMemory());
        return redirect()->route('dashboard')->with(['success' => 'XML generated : ' . public_path() . '\JAVA_UPDATER\xml/' . $FOLDER . ".xml"]);
    }

    public function create(Request $request)
    {
        $PROJECT_NAME = $request->input('PROJECT_NAME');

        if($PROJECT_NAME) {
          if(mkdir(public_path() . '\JAVA_UPDATER\files/' . $PROJECT_NAME, 777, 1))
            return redirect()->route('dashboard')->with(['success' => 'Project created !']);
          else
            return redirect()->route('dashboard')->with(['error' => 'Project cannot be created ! :(']);
        } else {
          return redirect()->route('dashboard')->with(['error' => 'Project name is empty']);
        }
    }

    public function upload(Request $request)
    {
        /*$FILES_LIST = $request->file('FILES_LIST');
        $PROJECT_NAME = $request->input('FOLDER');

        foreach ($FILES_LIST as $element) {
          move_uploaded_file($element, public_path() . '\JAVA_UPDATER\files/' . $PROJECT_NAME . "/" . basename($element));
        }

        return redirect()->route('project_management', $PROJECT_NAME);*/


        //https://stackoverflow.com/questions/44577380/how-to-upload-files-in-laravel-directly-into-public-folder
    }
}