<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Epharma\Model\Option;

class SettingsController extends Controller {

    public function saveSettings(Request $request) {
        $inputs = $request->except(['_token']);

        foreach ($inputs as $key => $input) {
            $value = is_array($input) ? json_encode($input) : $input;
            Option::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return back();
    }

    public function frontpage() {
        return view('settings/frontpage');
    }

}
