@extends("layout.layout")
@section("page-title", __("pages.home"))

@section("content")
    <div class="row" style="margin-top: 2%;">
        <div class="card" style="width: 18rem; margin-right: 30%; margin-left: 10%">
            <img class="card-img-top" src="https://www.groningen-seaports.com/wp-content/uploads/placeholder.jpg">
            <div class="card-body">
                <h5 class="card-title">Almere</h5>
                <p class="card-text">Adres gegevens</p>
                <a href="https://maps.google.com" class="btn btn-primary">Route</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://www.groningen-seaports.com/wp-content/uploads/placeholder.jpg">
            <div class="card-body">
                <h5 class="card-title">Arnhem</h5>
                <p class="card-text">Adres gegevens.</p>
                <a href="https://maps.google.com" class="btn btn-primary">Route</a>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 2%;">
        <div class="card" style="width: 18rem; margin-right: 30%; margin-left: 10%">
            <img class="card-img-top" src="https://www.groningen-seaports.com/wp-content/uploads/placeholder.jpg">
            <div class="card-body">
                <h5 class="card-title">Breda</h5>
                <p class="card-text">Adres gegevens</p>
                <a href="https://maps.google.com" class="btn btn-primary">Route</a>
            </div>
        </div>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="https://www.groningen-seaports.com/wp-content/uploads/placeholder.jpg">
            <div class="card-body">
                <h5 class="card-title">Utrecht</h5>
                <p class="card-text">Adres gegevens</p>
                <a href="https://maps.google.com" class="btn btn-primary">Route</a>
            </div>
        </div>
    </div>
@endsection
