<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use App\WebStats;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index(Request $request){
        $settingsData = WebStats::find(1);
        return view("admin.index")->with("settingsData", $settingsData);
    }
}
