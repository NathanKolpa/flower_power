@extends("layout.layout")
@section("page-title", __("pages.admin_products"))

@section("content")
    <div class="row">
        <div class="col-8 mx-auto">
            <form method="post" action="{{ route("admin.products.edit.update", [$product->id]) }}">
                @csrf

                @include('pages.admin.products.product-form')

                @can('update', $product)
                    <input type="submit" class="btn btn-primary">
                @endcan
                
                @can('delete', $product)
                    <input type="submit" name="_method" value="delete" class="btn btn-danger">
                @endcan
            </form>
        </div>
    </div>
@endsection
