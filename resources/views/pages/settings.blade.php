@extends("layout.layout")
@section("page-title", __("pages.home"))

@section("content")

    <div class="row" style="margin-top: 5%">
        <div class="col-md-2">
            <nav class="nav flex-column">
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account") }}">Profile</a>
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account.orders") }}">Bestellingen</a>
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account.address") }}">Adres</a>

            </nav>
        </div>
        <div class="col-md-10">
            <div class="col-8 mx-auto">
                <form method="POST" action="{{ route("account.update")  }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <x-form-field :title="__('general.first_name')"
                                          required="true" name="first_name" type="text" value="{{Auth::user()->first_name}}"></x-form-field>
                        </div>
                        <div class="form-group col-lg-3">
                            <x-form-field :title="__('general.middle_name')"
                                          required="false" name="middle_name" value="{{Auth::user()->middle_name}}" type="text"></x-form-field>
                        </div>
                        <div class="form-group col-lg-5">
                            <x-form-field :title="__('general.last_name')"
                                          required="true" name="last_name" value="{{Auth::user()->last_name}}" type="text"></x-form-field>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">@lang("general.edit")</button>
                </form>
            </div>
        </div>
    </div>


@endsection
