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
                <p>{{$user->name}}</p>
                <h4>Achternaam</h4>
                <p>{{$user->email}}</p>
                <h4>Signed up at:</h4>
                <p>{{$user->created_at}}</p>
                <h4>Admin:</h4>
                <p>@if($user->hasrole("admin")) Yes @else No @endif</p>
            </div>
        </div>
        <a href="{{$user->id}}/edit" class="btn btn-block btn-primary">edit</a>
    </div>
@endsection
