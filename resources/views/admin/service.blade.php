@extends("layouts.admin")
@section("doctitle")

@endsection
@section("title")
    Edit {{$service->title}} pagina
@endsection

@section("content")
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <form class="col-12" action="/admin/editpage/{{$service->name}}" method="post" enctype="multipart/form-data">
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
                <div class="row">
                    <div id="workplanList" class="mt-3 col">
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
                                            <textarea type="name" id="workplanStep_{{$workplanIndex}}" name="workplanStep_{{$workplanIndex}}" placeholder="title" class="form-control">{{$workplanItem}} </textarea>
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
                    <div id="mediaList" class="mt-3 col">
                        @if(count($service->ServiceMedia->all()) < 1)
                            <div class="form-group">
                                <input id="mediaCount" name="mediaCount" type="hidden" value="0">
                                <label class="form-control-label">Select amound of Media</label>
                                <input type="number" class="form-control" value="1" step="1" onchange="setMedia(this)">
                            </div>
                            <div id="mediaDiv_0">
                                <h4>media 1</h4>
                                <div class="form-group">
                                    <input type="name" name="linkMedia_0" placeholder="title" class="form-control">
                                </div>
                            </div>
                            @else
                            @foreach($service->ServiceMedia->all() as $mediaIndex => $mediaItem)
                                <div class="form-group">
                                    <input id="mediaCount" name="mediaCount" type="hidden" value="{{count($service->ServiceMedia->all()) - 1}}">
                                    <label class="form-control-label">Select amound of Media</label>
                                    <input type="number" class="form-control" value="{{count($service->ServiceMedia->all())}}" step="1" onchange="setMedia(this)">
                                </div>
                                <div id="mediaDiv_{{$mediaIndex}}">
                                    <h4>media {{$mediaIndex + 1}}</h4>
                                    <div class="form-group">
                                        <input type="name" name="linkMedia_{{$mediaIndex}}" placeholder="title" value="{{$mediaItem->link}}" class="form-control">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-block btn-primary" type="submit">Save</button>
    </form>
    <script>
        function setMedia(el){
            let i;
            for(i = 0; i < parseInt(el.value); i++){
                console.log(el.value)
                let name = `mediaDiv_${i}`;
                const products = document.getElementById("mediaList");
                const div = document.createElement('div');
                div.id = name;
                div.innerHTML = `
                    <h4>media ${i + 1}</h4>
                    <div class="form-group">
                        <input type="name" name="linkMedia_${i}" placeholder="title" class="form-control">
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
                        <textarea type="name" id="workplanStep_${i}" name="workplanStep_${i}" placeholder="title" class="form-control"></textarea>
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
