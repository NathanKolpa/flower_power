@extends("layout.layout")
@section("page-title", __("pages.register"))

@section("content")
    <div class="row">
        <div class="col-8 mx-auto">
            <form method="post" action="{{ route("loginRequest") }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <x-form-field :title="__('general.email')"
                                      required="true" name="email" type="email"></x-form-field>
                    </div>
                    <div class="form-group col-md-6">
                        <x-form-field :title="__('general.password')"
                                      required="true" name="password" type="password"></x-form-field>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">@lang("general.sign_in")</button>
            </form>
        </div>
    </div>
@endsection
