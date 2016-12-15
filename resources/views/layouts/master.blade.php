<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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
            <a href="{{ route('catalog') }}">Catalogue</a>
            <a href="{{ route('cart.index') }}">Panier</a>
            @if (Auth::guest())
                <a href="{{ route('customer.login') }}">Connexion</a>
            @else
            <a href="{{ route('customer.dashboard') }}">Mon compte</a>
                <form class="" action="{{ route('customer.logout') }}" method="post">
                    {{ csrf_field() }}
                    <button type="submit">Déconnexion</button>
                </form>
            @endif
        </nav>

        <main>
            @yield('content')
        </main>

        <footer>
            Copyright &copy; <time datetime="{{date('Y')}}">{{date('Y')}}</time>
        </footer>
    </div>

    <script src="{{ asset('/assets/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bundle.js') }}"></script>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'cartUrl' => route('cart.index'),
        ]); ?>
    </script>
    @yield('js')
</body>
</html>
