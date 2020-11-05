@extends("layout.layout")
@section("page-title", __("pages.shopping_cart"))

@section("content")
    <div class="row">
        <div class="col-12">


            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">@lang("general.name")</th>
                    <th scope="col">@lang("general.quantity")</th>
                    <th scope="col">@lang("general.price")</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->pivot->product_count}}</td>
                        <td>$ {{$product->pivotTotal}}</td>
                        <td>
                            <form method="post" action="{{ route("shopping-cart.delete", [$user->id, $product->id]) }}">
                                @csrf
                                @method("delete")
                                <button class="btn btn-danger">@lang("general.delete")</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
