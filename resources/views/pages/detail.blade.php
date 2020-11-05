@extends("layout.layout")
@section("page-title", __("pages.home"))


@section("content")
    <div class="row" style="margin-top: 5%">
        <div class="col-md-6"><img src="https://www.groningen-seaports.com/wp-content/uploads/placeholder.jpg" style="width: 100%"></div>
        <div class="col-md-6">
            <div class="row">
                <h2>{{$product->name}}</h2>
            </div>
            <div class="row">
                <a>€{{$product->price}}</a>
            </div>
            <div class="row">
                <a>{{$product->description}}</a>
            </div>
            <div class="row">
                <form method="post" action="{{ route('shopping-cart.create', $product->id) }}">
                    @csrf
                    <input type="number" name="product_count" required value="1">
                    <button class="btn btn-primary">@lang("general.addToCard")</button>
                </form>
            </div>
        </div>
    </div>
@endsection
