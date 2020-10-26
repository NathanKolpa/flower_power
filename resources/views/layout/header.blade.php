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
                <a class="nav-link" href="#">@lang("pages.search")</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">@lang("pages.contact")</a>
            </li>
        </ul>
    </div>
    <div class="mx-auto order-0">
        {{--            search bar??--}}
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">@lang("pages.login")</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("register") }}">@lang("pages.register")</a>
            </li>
        </ul>
    </div>
</nav>
