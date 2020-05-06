<?php

namespace App\Http\Controllers\admin;

use App\Services;
use App\ServicesMedia;
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
        return view("admin.service")->with("service", Services::where('name', $service)->first());
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
        $workPlanResult = [];
        for ($i = 0; $i <= $request->workplanCount; $i++){
            $bodyWorkplan = "workplanStep_" . $i;
            $workPlanResult[] = $request->$bodyWorkplan;
        }
        $getService = Services::where('name', $service)->first();
        if ($request->hasfile("banner")){
            $bannerPath = $this->saveImage($request, "banner", $getService->banner);
            $getService->banner = $bannerPath;
        }
        $getService->title = $request->title;
        $getService->body = $request->body;
        $getService->workplan = json_encode($workPlanResult);
        $getService->save();
        $getMedia = ServicesMedia::where("service_id", $getService->id)->get();
        for ($i = 0; $i <= $request->mediaCount; $i++){
            $mediaLink = "linkMedia_" . $i;
            $currMedia = $getMedia->where("mediaIndex", "==",  $i)->first();
            if ($currMedia){
                $updateMedia = ServicesMedia::find($currMedia->id);
                if($request->hasfile($mediaLink)){
                    $imgPath = $this->saveImage($request, $mediaLink, $updateMedia->link);
                    $updateMedia->image = 1;
                    $updateMedia->link = $imgPath;
                }else {
                    $updateMedia->image = 0;
                    $updateMedia->link = $request->$mediaLink;
                }
                $updateMedia->save();
            }else {
                $addServiceMedia = new ServicesMedia();
                $addServiceMedia->service_id = $getService->id;
                $addServiceMedia->mediaIndex = $i;
                $addServiceMedia->link = $request->$mediaLink;
                $addServiceMedia->save();
            }
        }
        return redirect("/admin/editpage/trouwen/edit");
    }
    function saveImage($request, $fileName, $oldfile) {
        $oldfilepath = "images/" . $oldfile;
        if(file_exists($oldfilepath)){
            File::delete($oldfilepath);
        }
        $image = $request->file($fileName);
        $name = str::slug($request->input('title')) . '_' . time();
        $filePath =  '/' . $name . '.' . $image->getClientOriginalExtension();
        $request->$fileName->move(public_path('images'), $filePath);
        $imageSize = getimagesize(public_path('images' . $filePath));
        $imageCompress = Image::make(public_path('images' . $filePath))->fit(round($imageSize[0] / 1.6), round($imageSize[1] / 1.6));;
        $imageCompress->save();
        return $filePath;
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
