<?php

namespace App\Http\Controllers\admin;

use App\WebStats;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index(){
        $getStats = WebStats::find(1);
        return view("admin.settings")->with("settingsData", $getStats);
    }
    public function changeSettings(Request $request){
        $getStats = WebStats::find(1);
        $request->web_on_off == "offline" ? $getStats->maintenance = true : $getStats->maintenance = false;
        $getStats->save();
        return redirect("/admin/settings");
    }
}
