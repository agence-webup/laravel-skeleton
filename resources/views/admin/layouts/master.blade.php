<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Helium : admin boilerplate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('bower/helium/dist/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar__logo">
            <svg width="50" height="33" viewBox="0 0 50 33" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" fill-rule="evenodd">
                    <path d="M24.425 24.132l-6.134 5.985c-.422.412-.996.644-1.594.644-.6 0-1.173-.23-1.596-.643L2.662 17.97c-.876-.857-.876-2.252 0-3.115L15.1 2.712c.882-.856 2.31-.856 3.19 0l12.44 12.14" stroke="#FFF" stroke-width="3.213"/>
                    <path d="M25.285 8.7l6.133-5.986c.882-.857 2.31-.857 3.19 0l12.44 12.14c.878.857.878 2.25 0 3.115l-12.44 12.14c-.875.856-2.304.856-3.19 0L18.98 17.97" stroke="#FFF" stroke-width="3.213"/>
                    <path fill="url(#a)" opacity=".3" d="M22.855 5.693l1.462 1.418.215-.21-1.463-1.417" transform="translate(2 2)"/>
                    <path fill="url(#b)" opacity=".3" d="M21.177 21.92l1.454 1.43.225-.22-1.463-1.418" transform="translate(2 2)"/>
                </g>
            </svg>
        </div>
        <div class="sidebar__user">
            Hello Richard
        </div>
        <div class="sidebar__links">
            <li><a href="#"><i class="fa fa-external-link icon"></i> Go to website</a></li>
            <li><a href="login.html"><i class="fa fa-sign-out icon"></i> Se déconnecter</a></li>
        </div>
        <nav class="navigation">
            <ul>
                <li class="navigation__header">Menu 1</li>
                <li class="isActive"><a href="#">Menu 1.a</a></li>
                <li><a href="#">Menu 1.b</a></li>
                <li><a href="#">Menu 1.c</a></li>
                <li class="navigation__header">Menu 2</li>
                <li><a href="#">Menu 2.a</a></li>
                <li><a href="#">Menu 2.b</a></li>
                <li><a href="#">Menu 2.c</a></li>
            </ul>
        </nav>
    </aside>
    <main class="content">
        @yield('content')
    </main>
</body>
</html>
