@extends("layouts.admin")
@section("docTitle")
    Edit user {{$user->name}}
@endsection
@section("title")
    Edit user {{$user->name}}
@endsection
@section("content")
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <form method="post" action="/admin/users/{{$user->id}}">
            @csrf
            @method("PUT")
            <div class="card">
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
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" name="email" type="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input id="email" class="form-control" name="password" type="password" placeholder="change password" minlength="8" value="">
                    </div>
                    <h4>Admin:</h4>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="admin" value="true" @if($user->hasrole("admin"))checked=""@endif class="custom-control-input"><span class="custom-control-label">Yes</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="admin" value="false" @if(!$user->hasrole("admin"))checked=""@endif class="custom-control-input"><span class="custom-control-label">false</span>
                    </label>
                    <h4>Signed up at:</h4>
                    <p>{{$user->created_at}}</p>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Save</button>
        </form>
    </div>
@endsection
