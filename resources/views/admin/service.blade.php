@extends("layouts.admin")
@section("doctitle")

@endsection
@section("title")
    Edit {{$service->title}} pagina
@endsection

@section("content")
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <form>
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Titel</label>
                        <input id="inputText3" type="text" value="{{$service->title}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Pagina inhoud</label>
                        <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor">{!! $service->body !!}</textarea>
                        <script>
                            CKEDITOR.replace( 'summary-ckeditor' );
                        </script>
                    </div>
                </form>
            </div>
        </div>
        <button class="btn btn-block btn-primary" type="submit">Save</button>
    </form>
@endsection
