<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Helium : admin boilerplate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('/node_modules/datatables/media/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/node_modules/dropmic/dist/dropmic.css') }}">
    <link rel="stylesheet" href="{{ asset('/node_modules/helium-admin/dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/admin/css/admin.css') }}" >

</head>
<body>
    <header class="header">
        <div class="header__logo">
            <svg width="50" height="33" viewBox="0 0 50 33" xmlns="http://www.w3.org/2000/svg">
                <g fill="none" fill-rule="evenodd">
                    <path d="M24.425 24.132l-6.134 5.985c-.422.412-.996.644-1.594.644-.6 0-1.173-.23-1.596-.643L2.662 17.97c-.876-.857-.876-2.252 0-3.115L15.1 2.712c.882-.856 2.31-.856 3.19 0l12.44 12.14" stroke="#FFF" stroke-width="3.213"/>
                    <path d="M25.285 8.7l6.133-5.986c.882-.857 2.31-.857 3.19 0l12.44 12.14c.878.857.878 2.25 0 3.115l-12.44 12.14c-.875.856-2.304.856-3.19 0L18.98 17.97" stroke="#FFF" stroke-width="3.213"/>
                    <path fill="url(#a)" opacity=".3" d="M22.855 5.693l1.462 1.418.215-.21-1.463-1.417" transform="translate(2 2)"/>
                    <path fill="url(#b)" opacity=".3" d="M21.177 21.92l1.454 1.43.225-.22-1.463-1.418" transform="translate(2 2)"/>
                </g>
            </svg>
        </div>
        <div class="header__infos">
            <a href="{{ route('home') }}">Aller sur le site</a>
            <span><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Se déconnecter</a></span>
        </div>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="post" style="display: none;">
            {{ csrf_field() }}
        </form>
    </header>

    <div class="layout">
        @include('helium::elements.menu')

        <main class="content">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('/node_modules/dropmic/dist/dropmic.js') }}"></script>
    <script src="{{ asset('/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/assets/admin/js/modules/datatable.js') }}"></script>
    @yield('js')
</body>
</html>
