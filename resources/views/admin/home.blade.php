@extends("layouts.admin")
@section("docTitle")
    Edit {{$pageData->title}} pagina
@endsection
@section("title")
    Edit {{$pageData->title}} pagina
@endsection

@section("content")
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <form class="col-12" action="/admin/editpage/{{$pageData->name}}" method="post" enctype="multipart/form-data">
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
                    <input id="inputText3" type="text" name="title" value="{{$pageData->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="banner">Upload banner</label>
                    <input id="banner" type="file" name="banner" class="form-control">
                </div>
                <hr style="background-color: gray;">
                <div class="row">
                    <div class="mt-6 col-12 col-sm-12 col-lg-4 col-md-12 col">
                        <h3>Over mij home</h3>
                        <div class="input-group mb-3" >
                            <img width="100%" height="100%" style="margin: 5%;" src={{asset("../images/" . json_decode($pageData->body)->aboutMeImages[0])}}>
                        </div>
                    </div>
                    <div class="mt-6 col-12 col-sm-12 col-lg-8 col-md-12 col">
                        <div class="form-group">
                            <label for="banner">Upload Image</label>
                            <input id="banner" type="file" name="aboutMeBodyImg_0" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Over mij tekst kort</label>
                            <textarea class="form-control" id="summary-ckeditor-over" name="aboutMeBody_0">
                                    @if (json_decode($pageData->body) && json_decode($pageData->body)->aboutMeBody[0])
                                    {!! json_decode($pageData->body)->aboutMeBody[0] !!}
                                @else
                                @endif
                                </textarea>
                            <script>
                                CKEDITOR.replace( 'summary-ckeditor-over' );
                            </script>
                        </div>

                    </div>
                    <div class="mt-6 col-12 col-sm-12 col-lg-12 col-md-12 col">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Over mij tekst lang</label>
                            <textarea class="form-control" id="summary-ckeditor-ext" name="aboutMeBodyExt_0">
                                        @if (json_decode($pageData->body) && json_decode($pageData->body)->aboutMeBodyExt[0])
                                    {!! json_decode($pageData->body)->aboutMeBodyExt[0] !!}
                                @else
                                @endif
                                    </textarea>
                            <script>
                                CKEDITOR.replace( 'summary-ckeditor-ext' );
                            </script>
                        </div>
                    </div>
                </div>
                <hr style="background-color: gray;">
                <div class="row">
                    <div class="mt-6 col-12 col-sm-12 col-lg-6 col-md-12 col">
                        <div class="input-group mb-3">
                            <img width="60%" height="60%" style="margin: 5%;" src={{asset("../images/" . json_decode($pageData->body)->images[0])}}>
                        </div>
                        <div class="form-group">
                            <label for="banner">Upload Image</label>
                            <input id="banner" type="file" name="bodyImg_0" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Home page info 1</label>
                            <textarea class="form-control" id="summary-ckeditor" name="body_0">
                                @if (json_decode($pageData->body) && json_decode($pageData->body)->body[0])
                                    {!! json_decode($pageData->body)->body[0] !!}
                                @else
                                @endif
                            </textarea>
                            <script>
                                CKEDITOR.replace( 'summary-ckeditor' );
                            </script>
                        </div>
                    </div>
                    <div class="mt-6 col-12 col-sm-12 col-lg-6 col-md-12 col">
                        <div class="input-group mb-3">
                            <img width="60%" height="60%" style="margin: 5%;" src={{asset("../images/" . json_decode($pageData->body)->images[1])}}>
                        </div>
                        <div class="form-group">
                            <label for="banner">Upload Image</label>
                            <input id="banner" type="file" name="bodyImg_1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Home page info 2</label>
                            <textarea class="form-control" id="summary-ckeditor2" name="body_1">
                            @if (json_decode($pageData->body) && json_decode($pageData->body)->body[1])
                                    {!! json_decode($pageData->body)->body[1] !!}
                                @else
                                @endif
                        </textarea>
                            <script>
                                CKEDITOR.replace( 'summary-ckeditor2' );
                            </script>
                        </div>
                    </div>
                </div>
                <hr style="background-color: gray;">
                <div class="row">
                    <div id="mediaList" class="mt-6 col-12 col-sm-12 col-lg-12 col-md-6 col">
                        <h3>Media Slider</h3>
                        @if(count($pageData->PagesMedia->all()) < 1)
                            <div class="form-group">
                                <input id="mediaCount" name="mediaCount" type="hidden" value="0">
                                <label class="form-control-label">Select amound of Media</label>
                                <input type="number" class="form-control" value="1" step="1" onchange="setMedia(this)">
                            </div>
                            <div id="mediaDiv_0">
                                <h4>media 1</h4>
                                <div class="form-group">
                                    <div class="input-group mb-3" id="mediaInputField_0">
                                        <input type="file" id="linkMedia_0" name="linkMedia_0" class="form-control">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="form-group">
                                <input id="mediaCount" name="mediaCount" type="hidden" value="{{count($pageData->PagesMedia->all()) - 1}}">
                                <label class="form-control-label">Select amound of Media</label>
                                <input type="number" class="form-control" value="{{count($pageData->PagesMedia->all())}}" step="1" onchange="setMedia(this)">
                            </div>
                            @foreach($pageData->PagesMedia->all() as $mediaIndex => $mediaItem)
                                <div id="mediaDiv_{{$mediaIndex}}">
                                    <h4>media {{$mediaItem->mediaIndex + 1}}</h4>
                                    <div class="form-group">
                                        <div class="row">
                                            <div id="mediaList" class="mt-6 col-12 col-sm-12 col-lg-2 col-md-12 col">
                                                <div class="input-group mb-3">
                                                    <img width="100%" height="100%" style="margin: 5%;" src={{asset("../images/$mediaItem->link")}}>
                                                </div>
                                            </div>
                                            <div id="mediaList" class="mt-6 col-12 col-sm-12 col-lg-10 col-md-12 col">
                                                <label class="form-control-label">Slide Title</label>
                                                <input id="inputText3" type="text" name="linkMediaTitle_{{$mediaItem->mediaIndex}}" value="{{$mediaItem->title}}" class="form-control">
                                                <label class="form-control-label">Slide Subtitle</label>
                                                <input id="inputText3" type="text" name="linkMediaSubtitle_{{$mediaItem->mediaIndex}}" value="{{$mediaItem->subtitle}}" class="form-control">
                                                <div class="input-group mb-3" id="mediaInputField_{{$mediaItem->mediaIndex}}">
                                                    <input type="file" id="linkMedia_{{$mediaItem->mediaIndex}}" name="linkMedia_{{$mediaItem->mediaIndex}}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
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
        function changeInputType(el, option) {
            const mediaInputDiv = document.getElementById("mediaInputField_" + el);
            const currentInputEl = document.getElementById("linkMedia_" + el);
            const input = document.createElement('input');
            input.name = "linkMedia_" + el;
            input.id = "linkMedia_" + el;
            input.className = "form-control";
            if (option == "img"){
                if (!(currentInputEl.type === "file")){
                    mediaInputDiv.removeChild(document.getElementById("linkMedia_" + el));
                    input.type = "file";
                    mediaInputDiv.appendChild(input);
                }
            }else {
                if (!(currentInputEl.type === "text")) {
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
                            <label class="form-control-label">Slide Title</label>
                            <input id="inputText3" type="text" name="linkMediaTitle_${i}" class="form-control">
                            <label class="form-control-label">Slide Subtitle</label>
                            <input id="inputText3" type="text" name="linkMediaSubtitle_${i}" class="form-control">
                            <div class="input-group mb-3" id="mediaInputField_${i}">
                                <input type="file" id="linkMedia_${i}" name="linkMedia_${i}" class="form-control">
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
