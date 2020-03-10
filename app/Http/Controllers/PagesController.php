<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homePage()
    {
        return view("index");
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
}
