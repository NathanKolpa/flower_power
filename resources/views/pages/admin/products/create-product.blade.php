@extends("layout.layout")
@section("page-title", __("pages.admin_products"))

@section("content")
    <div class="row">
        <div class="col-8 mx-auto">
            <form method="post" action="{{ route("admin.products.edit.create")  }}">
                @csrf

                @include('pages.admin.products.product-form')

                <input type="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection
