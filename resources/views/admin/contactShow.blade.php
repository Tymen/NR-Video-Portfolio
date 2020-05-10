@extends("layouts.admin")
@section("docTitle")
    Contact inbox
@endsection
@section("title")
    Contact inbox
@endsection
@section("content")
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h4>Name</h4>
                <p>{{$contactData->firstName}}</p>
                <h4>Achternaam</h4>
                <p>{{$contactData->lastName}}</p>
                <h4>email</h4>
                <p>{{$contactData->email}}</p>
                <h4>dienst</h4>
                <p>{{$services->find($contactData->service_id)->name}}</p>
                <h4>Titel</h4>
                <p>{{$contactData->subject}}</p>
                <h4>Bericht</h4>
                <p>{{$contactData->message}}</p>
            </div>
        </div>
    </div>
@endsection
