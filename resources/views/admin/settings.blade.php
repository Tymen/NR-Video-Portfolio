@extends("layouts.admin")
@section("docTitle")
    Settings
@endsection
@section("title")
    Settings
@endsection
@section("content")
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <form action="/admin/settings" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <h5>Website online:</h5>
                    @if($settingsData->maintenance)
                        <div style="display:inline-block;width: 20px; height: 20px; border-radius: 50%; background-color: red"></div>
                        @else
                        <div style="display:inline-block; width: 20px; height: 20px; border-radius: 50%; background-color: greenyellow"></div>
                    @endif
                    <div>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="web_on_off" value="offline" @if($settingsData->maintenance)checked=""@endif class="custom-control-input"><span class="custom-control-label">Offline</span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="web_on_off" value="online" @if(!$settingsData->maintenance)checked=""@endif class="custom-control-input"><span class="custom-control-label">Online</span>
                        </label>
                    </div>
                </div>
            </div>
            <button class="btn btn-block btn-primary" type="submit">Save</button>
        </form>
    </div>
@endsection
