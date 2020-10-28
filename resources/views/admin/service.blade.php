@extends("layouts.admin")
@section("docTitle")
    Edit {{$service->title}} pagina
@endsection
@section("title")
    Edit {{$service->title}} pagina
@endsection

@section("content")
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <form class="col-12" action="/admin/editservice/{{$service->name}}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Titel</label>
                    <input id="inputText3" type="text" name="title" value="{{$service->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="banner">Upload banner</label>
                    <input id="banner" type="file" name="banner" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Pagina inhoud</label>
                    <textarea class="form-control" id="summary-ckeditor" name="body">{!! $service->body !!}</textarea>
                    <script>
                        CKEDITOR.replace( 'summary-ckeditor' );
                    </script>
                </div>
                <hr style="background-color: gray;">
                @if ($service->name == "over")
                    <div class="row">
                        <div id="mediaList" class="mt-6 col-12 col-sm-12 col-lg-12 col-md-12 col">
                            @if(count($service->ServiceMedia->all()) < 1)
                                <div class="form-group">
                                    <input id="mediaCount" name="mediaCount" type="hidden" value="0">
                                    <label class="form-control-label">Select amound of Media</label>
                                    <input type="number" class="form-control" value="1" step="1" onchange="setMedia(this)">
                                </div>
                                <div id="mediaDiv_0">
                                    <h4>media 1</h4>
                                    <div class="form-group">
                                        <div class="input-group mb-3" id="mediaInputField_0">
                                            <div class="input-group-append be-addon">
                                                <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Select type</button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(1158px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a onclick="changeInputType('0', 'img')" class="dropdown-item">Image</a>
                                                    <a onclick="changeInputType('0', 'video')" class="dropdown-item">Video</a>
                                                </div>
                                            </div>
                                            <input type="text" id="linkMedia_0" name="linkVideo_0" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <input id="mediaCount" name="mediaCount" type="hidden" value="{{count($service->ServiceMedia->all()) - 1}}">
                                    <label class="form-control-label">Select amound of Media</label>
                                    <input type="number" class="form-control" value="{{count($service->ServiceMedia->all())}}" step="1" onchange="setMedia(this)">
                                </div>
                                @foreach($service->ServiceMedia->all() as $mediaIndex => $mediaItem)
                                    <div id="mediaDiv_{{$mediaIndex}}">
                                        <h4>media {{$mediaItem->mediaIndex + 1}}</h4>
                                        <div class="form-group">
                                            @if($mediaItem->image)
                                                <div class="input-group mb-3">
                                                    <img width="80%" height="80%" src={{asset("../images/$mediaItem->link")}}>                                            </div>
                                                <div class="input-group mb-3" id="mediaInputField_{{$mediaItem->mediaIndex}}">
                                                    <div class="input-group-append be-addon">
                                                        <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Select type</button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(1158px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a onclick="changeInputType('{{$mediaItem->mediaIndex}}', 'img')" class="dropdown-item">Image</a>
                                                            <a onclick="changeInputType('{{$mediaItem->mediaIndex}}', 'video')" class="dropdown-item">Video</a>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="linkMedia_{{$mediaItem->mediaIndex}}" name="linkMedia_{{$mediaItem->mediaIndex}}" value="{{$mediaItem->link}}" class="form-control">
                                                </div>
                                            @else
                                                <div class="input-group mb-3">
                                                    <iframe width="80%" height="300" src="{{$mediaItem->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                </div>
                                                <div class="input-group mb-3" id="mediaInputField_{{$mediaItem->mediaIndex}}">
                                                    <div class="input-group-append be-addon">
                                                        <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Select type</button>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(1158px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                            <a onclick="changeInputType('{{$mediaItem->mediaIndex}}', 'img')" class="dropdown-item">Image</a>
                                                            <a onclick="changeInputType('{{$mediaItem->mediaIndex}}', 'video')" class="dropdown-item">Video</a>
                                                        </div>
                                                    </div>
                                                    <input type="text" id="linkMedia_{{$mediaItem->mediaIndex}}" name="linkVideo_{{$mediaItem->mediaIndex}}" value="{{$mediaItem->link}}" class="form-control">
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @else
                <div class="row">
                    <div id="workplanList" class="mt-6 col-12 col-sm-12 col-lg-6 col-md-12 col">
                        @if($service->workplan)
                            @if(count(json_decode($service->workplan)) < 0)
                                    <div class="form-group">
                                        <input id="workplanCount" name="workplanCount" type="hidden" value="1">
                                        <label class="form-control-label">Select amound of products</label>
                                        <input type="number" class="form-control" value="1" step="1" onchange="setProd(this)">
                                    </div>
                                    <div id="workplanDiv_0">
                                        <h4>step 1</h4>
                                        <div class="form-group">
                                            <textarea type="name" id="workplanStep_0" name="workplanStep_0" placeholder="title" class="form-control"> </textarea>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <input id="workplanCount" name="workplanCount" type="hidden" value="{{count(json_decode($service->workplan)) - 1}}">
                                        <label class="form-control-label">Select amound of work steps</label>
                                        <input type="number" class="form-control" value="{{count(json_decode($service->workplan))}}" step="1" onchange="setProd(this)">
                                    </div>
                                @foreach(json_decode($service->workplan) as $workplanIndex => $workplanItem)
                                    <div id="workplanDiv_{{$workplanIndex}}">
                                        <h4>step {{$workplanIndex + 1}}</h4>
                                        <div class="form-group">
                                            <textarea type="name" rows="3" id="workplanStep_{{$workplanIndex}}" name="workplanStep_{{$workplanIndex}}" placeholder="title" class="form-control">{{$workplanItem}} </textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @else
                                <div class="form-group">
                                    <input id="workplanCount" name="workplanCount" type="hidden" value="1">
                                    <label class="form-control-label">Select amound of products</label>
                                    <input type="number" class="form-control" value="1" step="1" onchange="setProd(this)">
                                </div>
                                <div id="workplanDiv_0">
                                    <h4>step 1</h4>
                                    <div class="form-group">
                                        <textarea type="name" id="workplanStep_0" name="workplanStep_0" placeholder="title" class="form-control"> </textarea>
                                    </div>
                                </div>
                        @endif
                    </div>
                    <div id="mediaList" class="mt-6 col-12 col-sm-12 col-lg-6 col-md-12 col">
                        @if(count($service->ServiceMedia->all()) < 1)
                            <div class="form-group">
                                <input id="mediaCount" name="mediaCount" type="hidden" value="0">
                                <label class="form-control-label">Select amound of Media</label>
                                <input type="number" class="form-control" value="1" step="1" onchange="setMedia(this)">
                            </div>
                            <div id="mediaDiv_0">
                                <h4>media 1</h4>
                                <div class="form-group">
                                    <div class="input-group mb-3" id="mediaInputField_0">
                                        <div class="input-group-append be-addon">
                                            <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Select type</button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(1158px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a onclick="changeInputType('0', 'img')" class="dropdown-item">Image</a>
                                                <a onclick="changeInputType('0', 'video')" class="dropdown-item">Video</a>
                                            </div>
                                        </div>
                                        <input type="text" id="linkMedia_0" name="linkMedia_0" class="form-control">
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="form-group">
                                <input id="mediaCount" name="mediaCount" type="hidden" value="{{count($service->ServiceMedia->all()) - 1}}">
                                <label class="form-control-label">Select amound of Media</label>
                                <input type="number" class="form-control" value="{{count($service->ServiceMedia->all())}}" step="1" onchange="setMedia(this)">
                            </div>
                            @foreach($service->ServiceMedia->all() as $mediaIndex => $mediaItem)
                                <div id="mediaDiv_{{$mediaIndex}}">
                                    <h4>media {{$mediaItem->mediaIndex + 1}}</h4>
                                    <div class="form-group">
                                        @if($mediaItem->image)
                                            <div class="input-group mb-3">
                                                <img width="80%" height="80%" src={{asset("../images/$mediaItem->link")}}>                                            </div>
                                            <div class="input-group mb-3" id="mediaInputField_{{$mediaItem->mediaIndex}}">
                                                <div class="input-group-append be-addon">
                                                    <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Select type</button>
                                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(1158px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                        <a onclick="changeInputType('{{$mediaItem->mediaIndex}}', 'img')" class="dropdown-item">Image</a>
                                                        <a onclick="changeInputType('{{$mediaItem->mediaIndex}}', 'video')" class="dropdown-item">Video</a>
                                                    </div>
                                                </div>
                                                <input type="text" id="linkMedia_{{$mediaItem->mediaIndex}}" name="linkMedia_{{$mediaItem->mediaIndex}}" value="{{$mediaItem->link}}" class="form-control">
                                            </div>
                                        @else
                                        <div class="input-group mb-3">
                                                <iframe width="80%" height="300" src="{{$mediaItem->link}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                        <div class="input-group mb-3" id="mediaInputField_{{$mediaItem->mediaIndex}}">
                                            <div class="input-group-append be-addon">
                                                <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Select type</button>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(1158px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a onclick="changeInputType('{{$mediaItem->mediaIndex}}', 'img')" class="dropdown-item">Image</a>
                                                    <a onclick="changeInputType('{{$mediaItem->mediaIndex}}', 'video')" class="dropdown-item">Video</a>
                                                </div>
                                            </div>
                                            <input type="text" id="linkMedia_{{$mediaItem->mediaIndex}}" name="linkVideo_{{$mediaItem->mediaIndex}}" value="{{$mediaItem->link}}" class="form-control">
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
        <button class="btn btn-block btn-primary" type="submit">Save</button>
    </form>
    <script>
        function changeInputType(el, option) {
            const mediaInputDiv = document.getElementById("mediaInputField_" + el);
            const currentInputEl = document.getElementById("linkMedia_" + el);
            const input = document.createElement('input');
            input.className = "form-control";
            if (option == "img"){
                if (!(currentInputEl.type === "file")){
                    input.name = "linkMedia_" + el;
                    input.id = "linkMedia_" + el;
                    mediaInputDiv.removeChild(document.getElementById("linkMedia_" + el));
                    input.type = "file";
                    mediaInputDiv.appendChild(input);
                }
            }else {
                if (!(currentInputEl.type === "text")) {
                    input.name = "linkVideo_" + el;
                    input.id = "linkMedia_" + el;
                    mediaInputDiv.removeChild(document.getElementById("linkMedia_" + el));
                    input.type = "text";
                    mediaInputDiv.appendChild(input);
                }
            }
        }
        function setMedia(el){
            let i;
            for(i = 0; i < parseInt(el.value); i++){
                console.log(el.value)
                let name = `mediaDiv_${i}`;
                const products = document.getElementById("mediaList");
                const div = document.createElement('div');
                div.id = name;
                div.innerHTML = `
                    <div id="mediaDiv_${i}">
                        <h4>media ${i + 1}</h4>
                        <div class="form-group">
                            <div class="input-group mb-3" id="mediaInputField_${i}">
                                <div class="input-group-append be-addon">
                                    <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Select type</button>
                                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(1158px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a onclick="changeInputType('${i}', 'img')" class="dropdown-item">Image</a>
                                        <a onclick="changeInputType('${i}', 'video')" class="dropdown-item">Video</a>
                                    </div>
                                </div>
                                <input type="text" id="linkMedia_${i}" name="linkVideo_${i}" class="form-control">
                            </div>
                        </div>
                    </div>
                    `
                document.getElementById("mediaCount").value = i;
                if(document.getElementById(name)){
                }else {
                    products.appendChild(div);
                }
                for(x = 1; x < 11; x++){
                    if(document.getElementById(`mediaDiv_${x}`)){
                        let getId = document.getElementById(`mediaDiv_${x}`).id;
                        if(parseInt(getId.replace( /[^\d.]/g, '' )) >= el.value){
                            products.removeChild(document.getElementById(`mediaDiv_${x}`))
                        }
                    }
                }
            }
        }
        function setProd(el){
            let i;
            for(i = 0; i < parseInt(el.value); i++){
                console.log(el.value)
                let name = `workplanDiv_${i}`;
                const products = document.getElementById("workplanList");
                const div = document.createElement('div');
                div.id = name;
                div.innerHTML = `
                    <h4>step ${i + 1}</h4>
                    <div class="form-group">
                        <textarea type="name" rows="3" id="workplanStep_${i}" name="workplanStep_${i}" placeholder="title" class="form-control"></textarea>
                    </div>
                    `
                document.getElementById("workplanCount").value = i;
                if(document.getElementById(name)){
                }else {
                    products.appendChild(div);
                }
                for(x = 1; x < 11; x++){
                    if(document.getElementById(`workplanDiv_${x}`)){
                        let getId = document.getElementById(`workplanDiv_${x}`).id;
                        if(parseInt(getId.replace( /[^\d.]/g, '' )) >= el.value){
                            products.removeChild(document.getElementById(`workplanDiv_${x}`))
                        }
                    }
                }
            }
        }
    </script>
@endsection
