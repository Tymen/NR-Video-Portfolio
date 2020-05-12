@extends("layouts.admin")
@section("docTitle")
    Dashboard
@endsection
@section("title")
    Dashboard
@endsection
@section("content")
    <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h5 class="text-muted">Website online:</h5>
                    <a class="btn btn-primary text-white" href="/admin/settings">Settings</a>
                </div>
                <div class="float-right icon-circle-medium  icon-box-lg  bg-info-light mt-1">
                    @if($settingsData->maintenance)
                        <div style="display:inline-block;width: 25px; height: 25px; border-radius: 50%; background-color: red"></div>
                    @else
                        <div style="display:inline-block; width: 25px; height: 25px; border-radius: 50%; background-color: greenyellow"></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-inline-block">
                    <h3 class="text-muted">Go to HomePage</h3>
                    <a class="btn btn-primary text-white" href="/">Home Page</a>
                </div>
            </div>
        </div>
    </div>
@endsection
