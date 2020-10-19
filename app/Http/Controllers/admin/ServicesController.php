<?php

namespace App\Http\Controllers\admin;

use App\library\UploadImage;
use App\Pages;
use App\Services;
use App\ServicesMedia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($service)
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
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(Services $services, $service)
    {
        return $service === "anders" ? view("admin.anders")->with("service", Pages::where('name', $service)->first()) : view("admin.service")->with("service", Services::where('name', $service)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Services $services, $service)
    {
        $request->validate([
            'banner' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10248',
        ]);
        $uploadImage = new UploadImage;
        $workPlanResult = [];
        for ($i = 0; $i <= $request->workplanCount; $i++){
            $bodyWorkplan = "workplanStep_" . $i;
            $workPlanResult[] = $request->$bodyWorkplan;
        }
        $getService = Services::where('name', $service)->first();
        if ($request->hasfile("banner")){
            $getService->banner = $uploadImage->saveImage($request, "banner", $getService->banner);
        }
        $getService->title = $request->title;
        $getService->body = $request->body;
        $getService->workplan = json_encode($workPlanResult);
        $getService->save();
        $getMedia = ServicesMedia::where("service_id", $getService->id)->get();
        $mediaIndex = [];
        foreach($getMedia as $mediaId){
            array_push($mediaIndex, $mediaId->id);
        }
        DB::table("services_medias")->whereIn('id', $mediaIndex)->delete();
        for ($i = 0; $i <= $request->mediaCount; $i++){
            $mediaLink = "linkMedia_" . $i;
            $mediaVideo = "linkVideo_" . $i;
            $currMedia = $getMedia->where("mediaIndex", "==",  $i)->first();
            $addServiceMedia = new ServicesMedia();
            $addServiceMedia->service_id = $getService->id;
            $addServiceMedia->link = $request->$mediaLink;
            if($request->hasfile($mediaLink)){
                $addServiceMedia->image = 1;
                $addServiceMedia->link = $uploadImage->saveImage($request, $mediaLink);
            }elseif($request->$mediaVideo) {
                $addServiceMedia->link = $request->$mediaVideo;
                $addServiceMedia->image = 0;
            }else {
                $addServiceMedia->image = 1;
            }
            $addServiceMedia->mediaIndex = $i;
            $addServiceMedia->save();
        }
        return redirect('/admin/editservice/'. $service .'/edit');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Services $services)
    {
        //
    }
}
