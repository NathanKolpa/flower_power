@extends("layout.layout")
@section("page-title", __("pages.register"))

@section("content")
    <div class="row">
        <div class="col-8 mx-auto">
            <form method="POST" action="{{ route("register.create")  }}">
                @csrf

                <div class="form-row">
                    <div class="form-group col-lg-4">
                        <label>@lang("general.first_name")*</label>
                        <input name="first_name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label>@lang("general.middle_name")</label>
                        <input name="middle_name" type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-5">
                        <label>@lang("general.last_name")*</label>
                        <input name="last_name" type="text" class="form-control" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>@lang("general.email")*</label>
                        <input name="email" type="email" class="form-control" required>
                        <small class="form-text text-muted">@lang("text.email_disclaimer")</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label>@lang("general.password")*</label>
                        <input name="password" type="password" class="form-control" required>
                        <small class="form-text text-muted">@lang("text.password_requirements")</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">@lang("general.sign_up")</button>
            </form>
        </div>
    </div>
@endsection
