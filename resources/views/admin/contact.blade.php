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
        <h5 class="card-header">Basic Table</h5>
        <div class="card-body">
            <form action="/admin/contact" method="get">
                <p>Filter</p>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="filter" value="show_unread" @if($filter->unread)checked=""@endif class="custom-control-input"><span class="custom-control-label">show unread</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="filter" value="show_read" @if(!$filter->unread)checked=""@endif class="custom-control-input"><span class="custom-control-label">show read</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                    <input type="radio" name="filter" value="all" @if($filter->all)checked=""@endif class="custom-control-input"><span class="custom-control-label">show all</span>
                </label>
                <input type="submit" class="btn-primary btn" value="apply">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">status</th>
                    <th scope="col">voornaam</th>
                    <th scope="col">achternaam</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                </tr>
                </thead>
                <tbody>
                <p></p>
                @foreach($contactData as $contact)
                        <tr onclick="window.location.href = '/admin/contact/{{$contact->id}}'">
                            @if ($contact->opened)
                                <th scope="row"><i class="fas fa-envelope-open"></i></th>
                            @else
                                <th scope="row"><i class="fas fa-envelope"></i></th>
                            @endif
                            <td>{{$contact->firstName}}</td>
                            <td>{{$contact->lastName}}</td>
                            <td>{{$contact->subject}}</td>
                            <td>{{date_format($contact->created_at, ' H:i:s d-m-Y') }}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
            {{ $contactData->links() }}
            </form>
        </div>
    </div>
</div>
@endsection
