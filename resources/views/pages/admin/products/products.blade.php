@extends("layout.layout")
@section("page-title", __("pages.admin_products"))

@section("content")
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">@lang("general.id")</th>
                    <th scope="col">@lang("general.name")</th>
                    <th scope="col">@lang("general.price")</th>
                    <th scope="col">@lang("general.quantity")</th>
                    <th scope="col">@lang("general.on_sale")</th>
                    <th scope="col">@lang("general.actions")</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>€ {{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->on_sale ? 'true' : 'false' }}</td>

                        <td>
                            @canany(['update'], $product)
                                <a href="{{ route('admin.products.edit', [$product->id])  }}">@lang("general.edit")</a>
                            @endcanany
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
