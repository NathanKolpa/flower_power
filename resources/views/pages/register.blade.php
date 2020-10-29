@extends("layout.layout")
@section("page-title", __("pages.register"))

@section("content")

    <div class="row">
        <div class="col-8 mx-auto">
            <form method="POST" action="{{ route("register.create")  }}">
                @csrf

                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <x-form-field :title="__('general.first_name')"
                                      required="true" name="first_name" type="text" value="$firstName"></x-form-field>
                    </div>
                    <div class="form-group col-lg-3">
                        <x-form-field :title="__('general.middle_name')"
                                      required="false" name="middle_name" type="text"></x-form-field>
                    </div>
                    <div class="form-group col-lg-5">
                        <x-form-field :title="__('general.last_name')"
                                      required="true" name="last_name" type="text"></x-form-field>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <x-form-field :title="__('general.email')" :description=" __('text.email_disclaimer')"
                                      required="true" name="email" type="email"></x-form-field>
                    </div>
                    <div class="form-group col-md-6">
                        <x-form-field :title="__('general.password')" :description=" __('text.password_requirements')"
                                      required="true" name="password" type="password"></x-form-field>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">@lang("general.sign_up")</button>
            </form>
        </div>
    </div>
@endsection
