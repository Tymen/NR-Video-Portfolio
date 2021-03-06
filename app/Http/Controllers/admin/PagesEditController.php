<?php

namespace App\Http\Controllers\admin;

use App\library\UploadImage;
use App\Pages;
use App\PagesMedia;
use App\Services;
use App\ServicesMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PagesEditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($page)
    {
        $getPage = Pages::where('name', $page)->first();
        return view("admin." . $getPage->blade)->with("pageData", $getPage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $page)
    {
        $request->validate([
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10248',
        ]);

        $uploadImage = new UploadImage;
        $getPage = Pages::where('name', $page)->first();
        if ($request->hasfile("banner")){
            $getPage->banner = $uploadImage->saveImage($request, "banner", $getPage->banner);
        }

        $bodyObject = (object)[
            "images" => [],
            "body" => [],
            "aboutMeImages" => [],
            "aboutMeBody" => [],
            "aboutMeBodyExt" => [],
        ];
        $getPageBody = json_decode($getPage->body);
        for($x = 0; $x <= 1; $x++){
            $bodyImg = "bodyImg_" . $x;
            $aboutBodyImg = "aboutMeBodyImg_" . $x;
            $aboutBodyTekst = "aboutMeBody_" . $x;
            $aboutBodyTekstExt = "aboutMeBodyExt_" . $x;
            $bodytekst = "body_" . $x;
            if ($request->hasfile($bodyImg)){
                $getimage = json_decode($getPage->body) ? json_decode($getPage->body)->images[$x] : "";
                $imgLink = $uploadImage->saveImage($request, $bodyImg, $getimage);
                $bodyObject->images[] = $imgLink;
            }elseif ($getPageBody){
                if (array_key_exists($x, $getPageBody->images)){
                    $bodyObject->images[] = $getPageBody->images[$x];
                }else {
                    $bodyObject->images[$x] = "";
                }
            }else {
                $bodyObject->images[] = "";
            }
            if ($request->hasfile($aboutBodyImg)){
                $getimage = json_decode($getPage->body) ? json_decode($getPage->body)->aboutMeImages[$x] : "";
                $aboutimgLink = $uploadImage->saveImage($request, $aboutBodyImg, $getimage);
                $bodyObject->aboutMeImages[] = $aboutimgLink;
            }elseif ($getPageBody && property_exists($getPageBody, "aboutMeBody")){
                if (array_key_exists($x, $getPageBody->aboutMeImages)){
                    $bodyObject->aboutMeImages[] = $getPageBody->aboutMeImages[$x];
                }else {
                    $bodyObject->aboutMeImages[$x] = null;
                }
            }else {
                $bodyObject->aboutMeImages[] = "";
            }
            $bodyObject->aboutMeBodyExt[] = $request->$aboutBodyTekstExt;
            $bodyObject->aboutMeBody[] = $request->$aboutBodyTekst;
            $bodyObject->body[] = $request->$bodytekst;
        }
        $getPage->title = $request->title;

        $getPage->body = json_encode($bodyObject);
        $getPage->save();
        $getMedia = PagesMedia::where("pages_id", $getPage->id)->get();
        $mediaIndex = [];
        foreach($getMedia as $mediaId){
            array_push($mediaIndex, $mediaId->id);
        }
        DB::table("pages_medias")->whereIn('id', $mediaIndex)->delete();
        for ($i = 0; $i <= $request->mediaCount; $i++){
            $mediaLink = "linkMedia_" . $i;
            $mediaTitle = "linkMediaTitle_" . $i;
            $mediaSubTitle = "linkMediaSubtitle_" . $i;
            $pathImage = "pathImage_" . $i;
            $addServiceMedia = new PagesMedia();
            $addServiceMedia->title = $request->$mediaTitle;
            $addServiceMedia->subtitle = $request->$mediaSubTitle;
            $addServiceMedia->pages_id = $getPage->id;
            $addServiceMedia->mediaIndex = $i;
            if($request->hasfile($mediaLink)){
                $addServiceMedia->link = $uploadImage->saveImage($request, $mediaLink);
            }else {
                $addServiceMedia->link = $request->$pathImage;
            }
            $addServiceMedia->save();
        }
        return $page === "anders" ? redirect('/admin/editservice/anders/edit'): redirect('/admin/editpage/'. $page .'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
