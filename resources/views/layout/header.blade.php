<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route("home")  }}">{{ config("app.name")  }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route("home") }}">@lang("pages.home")</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("products") }}">@lang("pages.search")</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("contact") }}">@lang("pages.contact")</a>
            </li>


        </ul>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">

            @if(Auth::check() && Auth::user()->is_admin)
                <li class="nav-item">
                    <div class="dropdown">
                        <button class="btn nav-link dropdown-toggle btn-no-outline" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            @lang("pages.admin")
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                            @canany(['create', 'updateAny', 'deleteAny'], \App\Models\Product::class)
                                <a class="dropdown-item"
                                   href="{{ route("admin.products")  }}">@lang("pages.admin_products")</a>
                            @endcanany
                                    <a class="dropdown-item"
                                       href="{{ route("admin.orders")  }}">@lang("pages.admin_orders")</a>
                        </div>
                    </div>
                </li>
            @endif

            @if(Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("shopping-cart") }}">@lang("pages.shopping_cart")</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account') }}">{{ Auth::user()->first_name  }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('sign-out') }}">@lang('pages.logout')</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("login") }}">@lang("pages.login")</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route("register") }}">@lang("pages.register")</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
