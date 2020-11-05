@extends("layout.layout")
@section("page-title", __("pages.home"))

@section("content")
    <div class="row" style="margin-top: 5%">
        <div class="col-md-2">
            <nav class="nav flex-column">
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account") }}">Profile</a>
                <a class="nav-link" style="border-bottom: 1px solid lightgray" href="{{ route("account/orders") }}">Bestellingen</a>
            </nav>
        </div>
        <div class="col-md-10">
            @foreach($orders as $order)
                <div class="row" style="width: 100%; height: auto; border: 1px solid black">
                    <div class="col-md-3">Order id: {{$order->id}}</div>
                    <div class="col-md-3">
                        <table>
                            @foreach($order->products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-md-3">Totaal prijs: {{$order->price_paid/100}}</div>
                    <div class="col-md-3"><form method="post" action="/account/orders/delete/{{$order->id}}"><input type="hidden" name="_method" value="delete"><input type="submit" value="bestelling annuleren"></form></div>
                </div>
            @endforeach
        </div>
@endsection
