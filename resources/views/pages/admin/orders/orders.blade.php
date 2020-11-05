@extends("layout.layout")
@section("page-title", __("pages.admin_products"))

@section("content")
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">@lang("general.id")</th>
                    <th scope="col">@lang("general.user_id")</th>
                    <th scope="col">@lang("general.user_data")</th>
                    <th scope="col">@lang("general.paid_price")</th>
                    <th scope="col">@lang("general.products")</th>
                    <th scope="col">@lang("general.is_delivered")</th>
                    <th scope="col">@lang("general.created_at")</th>
                    <th scope="col">@lang("general.approve")</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>{{ $order->user_id }}</td>
                        <td>
                            <p>{{$order->user->first_name}} {{$order->user->middle_name}} {{$order->user->last_name}}</p>
                            <p>{{$order->address->street_name}} {{$order->address->house_number}} </p>
                            <p>{{$order->address->postal_code}}</p>
                        </td>
                        <td>€ {{ $order->price_paid/100 }}</td>
                        <td>
                            <table>
                                @foreach($order->products as $product)
                                    <tr>
                                        <td style="border: none">{{$product->pivot->product_count}}x</td>
                                        <td style="border: none">{{$product->name}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                        <td>{{ $order->is_delivered ? 'true' : 'false' }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            @if($order->is_delivered)
                                <p>Verstuurd!</p>
                            @else
                                <a class="btn btn-primary" href="{{ route("admin.order.approve", [$order->id]) }}">@lang("general.approve")</a>
                            @endif

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
