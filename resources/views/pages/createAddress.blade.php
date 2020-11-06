@extends("layout.layout")
@section("page-title", __("pages.register"))

@section("content")
    <div class="row">
        <div class="col-8 mx-auto">
            <form method="post" action="{{ route("account.create.address") }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <x-form-field :title="__('general.streetName')"
                                      required="true" name="straatnaam" type="text"></x-form-field>
                        <x-form-field :title="__('general.postalCode')"
                                      required="true" name="postcode" type="text"></x-form-field>
                    </div>
                    <div class="form-group col-md-6">

                        <x-form-field :title="__('general.houseNumber')"
                                      required="true" name="Huisnummer" type="number"></x-form-field>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">@lang("general.change")</button>
            </form>
        </div>
    </div>
@endsection
