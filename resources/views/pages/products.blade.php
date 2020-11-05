@extends("layout.layout")
@section("page-title", __("pages.home"))

@section("content")
        <div class="row" style="margin-top: 2%;">
            @foreach($products as $product)
            <div class="card" style="width: 15rem; margin-left: 3%; margin-bottom: 2%">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <p class="card-text">{{$product->price}}</p>
                    <a href="{{ route("product.detail",[$product->id]) }}" class="btn btn-primary">Meer informatie</a>
                </div>
            </div>
            @endforeach
        </div>
@endsection
