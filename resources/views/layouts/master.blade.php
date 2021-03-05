<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    @if(config('analytics.analytics_id'))
    @include('elements.marketing.analytics')
    @endif
    @if(config('analytics.gtm_id'))
    @include('elements.marketing.gtm')
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

    @yield('js')
</body>

</html>
