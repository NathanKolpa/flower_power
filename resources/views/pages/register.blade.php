@extends("layout.layout")
@section("page-title", __("pages.register"))

@section("content")
    <div class="row">
        <div class="col-8 mx-auto">
            <form>

                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <label>@lang("general.first_name")</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                        <label>@lang("general.middle_name")</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-5">
                        <label>@lang("general.last_name")</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>@lang("general.email")</label>
                        <input type="email" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>@lang("general.password")</label>
                        <input type="password" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">@lang("general.sign_up")</button>
            </form>
        </div>
    </div>
@endsection
