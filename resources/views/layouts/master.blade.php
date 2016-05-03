
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    @if(App::environment() == 'prod')
    @include('elements.marketing.analytics')
    @endif
</head>
<body>
    <div class="container">
        <header class="header">
            <a href="/">Site logo</a>
        </header>

        <nav class="navigation">
            <a href="#">Page 1</a>
            <a href="#">Page 2</a>
            <a href="#">Page 3</a>
            <a href="#">Page 4</a>
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            Copyright &copy; <time datetime="{{date('Y')}}">{{date('Y')}}</time>
        </footer>
    </div>

    <script src="{{ asset('bower/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bundle.js') }}"></script>
    @yield('js')
</body>
</html>
