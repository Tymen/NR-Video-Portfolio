<?php

namespace App\Http\Controllers;

use App\Pages;
use App\Services;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class PagesController extends Controller
{
    public function homePage()
    {
        dd(Pages::where('name', "anders")->first());
        return view("index")->with("services", Services::all())->with("pageData", Pages::where('name', "home")->first()->with("andersData", Pages::where('name', "anders")->first()));
    }
    public function portfolio()
    {
        return view("portfolio");
    }
    public function over(){
        return view("over")->with('serviceData', Services::where('name', '=', 'over')->first());
    }
    public function contact()
    {
        return view("contact");
    }
    public function services($route) {
        $serviceData = Services::where('name', '=', $route)->first();
        $andersData = Pages::where('name', '=', $route)->first();
        return ($route === "anders") ? view("layouts.anders")->with("serviceData", $andersData)->with("succes", null) : view("layouts.infoServiceLayout")->with("serviceData", $serviceData)->with("succes", null);
    }
    public function trouwen()
    {
        $serviceData = new Array_();
        $serviceData->docTitle = "Test";
        return view("layouts.infoServiceLayout")->with("serviceData", $serviceData);
    }
}
