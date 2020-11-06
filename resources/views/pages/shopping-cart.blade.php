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
            <p>@lang("general.total"): $ {{ $user->shoppingCartTotal }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

            <form class="form">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>@lang('general.takeaway_point')</label>
                        <select class="form-control">
                            <option>Almere</option>
                            <option>Arnhem</option>
                            <option>Breda</option>
                            <option>Utrecht</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary">@lang("general.takeaway")</button>
            </form>

        </div>
        <div class="col-md-6">
            <form class="form" action="{{ route("account.orders.create") }}" method="post">
                @csrf
                <input type="hidden" name="type" value="address">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>@lang('general.address')</label>
                        <select class="form-control" name="address">
                            @foreach($user->addresses as $address)
                                <option value="{{ $address->id  }}">{{ $address->street_name  }} {{ $address->house_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary">@lang("general.deliver")</button>
            </form>
        </div>
    </div>
@endsection
