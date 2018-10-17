<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function home()
    {
        $Settings_instance = new Settings();
        $Informations = $Settings_instance->Get();
        return view('Administration.settings', ['informations' => $Informations]);
    }

    public function update(Request $request)
    {
        $maintenance = $request->input('maintenance');
        $Settings_instance = new Settings();

        $Settings_instance->Set(['maintenance' => ($maintenance == "on") ? 1 : 0]);
        return redirect()->route('settings');
    }
}