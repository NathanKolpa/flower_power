@extends("layout.layout")
@section("page-title", __("pages.register"))

@section("content")
    <div class="row">
        <div class="col-8 mx-auto">
            <form method="post" action="{{ route("loginRequest") }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>@lang("general.email")</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>@lang("general.password")</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">@lang("general.sign_in")</button>
            </form>
        </div>
    </div>
@endsection
