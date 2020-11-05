@extends("layout.layout")
@section("page-title", __("pages.home"))


@section("content")

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://user-images.githubusercontent.com/194400/49531010-48dad180-f8b1-11e8-8d89-1e61320e1d82.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://user-images.githubusercontent.com/194400/49531010-48dad180-f8b1-11e8-8d89-1e61320e1d82.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://user-images.githubusercontent.com/194400/49531010-48dad180-f8b1-11e8-8d89-1e61320e1d82.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="col-md-12" style="border: 1px solid gray; margin: 2% 0;">
        <h1 class="col-md-2" style="margin: auto; text-align: center">SALE</h1>
    </div>
    <div class="row">
        @foreach($saleProducts as $saleProduct)
            <div class="card" style="width: 15rem; margin-left: 3%; margin-bottom: 2%">
                <div class="card-body">
                    <h5 class="card-title">{{$saleProduct->name}}</h5>
                    <p class="card-text">{{$saleProduct->description}}</p>
                    <p class="card-text">{{$saleProduct->price}}</p>
                    <a href="{{ route("product.detail",[$saleProduct->id]) }}" class="btn btn-primary">Meer informatie</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
