<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>kk7.me</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kamal Nasser">

    <link href="{{ URL::to('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('assets/css/app.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
        <script src="{{ URL::to('assets/js/html5shiv.js') }}"></script>
    <![endif]-->
</head>

<body>
    <div class="container-narrow">

        <div class="masthead">
            <ul class="nav nav-pills pull-right">
                <li
                    @if(Route::currentRouteAction() == 'UrlController@create')
                        class="active"
                    @endif
                >{{ Html::link(URL::action('UrlController@create'), 'Shorten a URL') }}</li>
            </ul>
            <h3 class="muted">kk7.me</h3>
        </div>

        <hr>

        <div class="jumbotron">
            @yield('content')
        </div>

        <hr>

        <div class="row-fluid marketing">
            <div class="span6">
                @include('url.last10')
            </div>

            <div class="span6">
                <h4>kk7.me is opensource!</h4>
                <p>kk7.me is built on top of the excellent <a href="http://laravel.com">Laravel 4</a> framework. You can view <a href="https://github.com/KamalN7/kk7.me">kk7.me's source code on Github</a>.</p>
            </div>
        </div>

        <hr>

        <div class="footer">
            <p>Built with love by <a href="http://kamalnasser.net">Kamal Nasser</a></p>
        </div>

    </div>
</body>
</html>
