<?php

namespace App\Http\Controllers\admin;

use App\Contact;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminContactController extends Controller
{
    public function index(Request $request){
        $filter = (object)[
            "unread" => null,
            "all" => true,
        ];
        if ($request->filter){
            if($request->filter == "show_unread"){
                $filter->unread = true;
                $filter->all = false;
                $contactData = Contact::where("opened", 0)->paginate(10);
            }
            elseif($request->filter == "show_read") {
                $filter->unread = false;
                $filter->all = false;
                $contactData = Contact::where("opened", 1)->paginate(10);
            }else {
                $filter->unread = true;
                $contactData = Contact::orderBy('created_at', 'desc')->paginate(10);
            }
        }else {
            $filter->unread = true;
            $contactData = Contact::orderBy('created_at', 'desc')->paginate(10);
        }
        $contactData->withPath(url()->full());
        return view("admin.contact")->with("contactData", $contactData)->with("filter", $filter);
    }
    public function show(Request $request, $id){
        $contactData = Contact::find($id);
        $contactData->opened = 1;
        $contactData->save();
        $services = Services::all();
        return view("admin.contactShow")->with("contactData", $contactData)->with("services", $services);
    }
}
