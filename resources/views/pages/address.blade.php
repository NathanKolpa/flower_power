@extends("layout.layout")
@section("page-title", __("pages.home"))

@section("content")
    <div class="row" style="margin-top: 5%">
        <div class="col-md-2">
            <nav class="nav flex-column">
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account") }}">Profile</a>
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account.orders") }}">Bestellingen</a>
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account.address") }}">Address</a>
            </nav>
        </div>
        <div class="col-md-10">
            <div class="row">
                @foreach($addresses as $address)
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$address->id}}</h5>
                            <p class="card-text">{{$address->street_name}} {{$address->house_number}}</p>
                            <p class="card-text">{{$address->postal_code}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection
