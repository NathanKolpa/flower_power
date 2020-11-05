@extends("layout.layout")
@section("page-title", __("pages.home"))

@section("content")

    <div class="row" style="margin-top: 5%">
        <div class="col-md-2">
            <nav class="nav flex-column">
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account") }}">Profile</a>
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account.orders") }}">Bestellingen</a>
            </nav>
        </div>
        <div class="col-md-10">
            <div class="col-8 mx-auto">
                <form method="POST" action="{{ route("account.update")  }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4"><a>@lang("general.first_name")*</a></div>
                        <div class="col-md-4"><a>@lang("general.middle_name")</a></div>
                        <div class="col-md-4"><a>@lang("general.last_name")*</a></div>
                    </div>
                    <div class="row" style="margin-bottom: 5%">
                        <div class="col-md-4"><input type="text" value="{{Auth::user()->first_name}}" required class="form-control"/></div>
                        <div class="col-md-4"><input type="text" value="{{Auth::user()->middle_name}}" class="form-control"/></div>
                        <div class="col-md-4"><input type="text" value="{{Auth::user()->last_name}}" required class="form-control"/></div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="@lang('general.change')"/>
                </form>
            </div>
        </div>
    </div>


@endsection
