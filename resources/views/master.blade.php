
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
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
            <h1>Page heading</h1>
            <p>Some content goes here</p>
        </main>

        <footer>
            Copyright &copy; <time datetime="{{date('Y')}}">{{date('Y')}}</time>
        </footer>
    </div>

    <script src="{{ asset('bower/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bundle.js') }}"></script>

    <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
</body>
</html>
