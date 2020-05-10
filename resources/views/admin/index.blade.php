@extends("layouts.admin")
@section("docTitle")
    Settings
@endsection
@section("title")
    Settings
@endsection
@section("content")
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
        <div class="card">
            <div class="card-body">
                <a class="btn btn-primary text-white" href="/admin/contact">Settings</a>
                <div class="d-inline-block">
                    <h5 class="text-muted">Website online:</h5>
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
@endsection
