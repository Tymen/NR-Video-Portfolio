@extends("layouts.admin")
@section("docTitle")
    User accounts overview
@endsection
@section("title")
    User accounts overview
@endsection
@section("content")
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">All Users</h5>
            <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Admin</th>
                            <th scope="col">voornaam</th>
                            <th scope="col">email</th>
                            <th scope="col">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <p></p>
                        @foreach($users as $user)
                            <tr onclick="window.location.href = '/admin/users/{{$user->id}}'">
                                <td>@if($user->hasrole("admin")) Yes @else No @endif</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{date_format($user->created_at, ' H:i:s d-m-Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
