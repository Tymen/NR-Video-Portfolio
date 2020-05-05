<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class PagesController extends Controller
{
    public function homePage()
    {
        return view("index")->with("services", Services::all());
    }
    public function portfolio()
    {
        return view("portfolio");
    }
    public function prijzen()
    {
        return view("prijzen");
    }
    public function contact()
    {
        return view("contact");
    }
    public function services($route) {
        $serviceData = Services::where('name', '=', $route)->first();
        return view("layouts.infoServiceLayout")->with("serviceData", $serviceData);
    }
    public function trouwen()
    {
        $serviceData = new Array_();
        $serviceData->docTitle = "Test";
        return view("layouts.infoServiceLayout")->with("serviceData", $serviceData);
    }
}
