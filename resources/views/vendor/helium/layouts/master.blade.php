<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>{{ config("helium.title") }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('/node_modules/helium-admin/dist/css/helium-vendors.css') }}" media="all">
  <link rel="stylesheet" href="{{ asset('/node_modules/helium-admin/dist/css/helium-base.css') }}" media="all">
  <script src="https://unpkg.com/feather-icons"></script>
  @yield('css')
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="header__logo">
        {{ config("helium.main_title") }}
        {{-- @if(config('app.env') == "local")
        <a href="{{ route("crud.index") }}">
        <i data-feather="plus-circle"></i>
        </a>
        @endif --}}
      </div>
      <div class="header__nav">
        @include('helium::elements.keyboard-shortcuts')
        @include('helium::elements.shortcuts')
        @include('helium::elements.user-infos')
      </div>

    </div>
  </header>
  @include('helium::elements.navigation')
  {!! Helium::header()->generate() !!}

  {!! Helium::flash()->generate() !!}

  <div class="container">
    <main class="content">

      @yield('content')
    </main>
  </div>


  <form id="logout-form" action="{{ route('admin.logout') }}" method="post" style="display: none;">
    {{ csrf_field() }}
  </form>

  <script src="{{ asset('/node_modules/helium-admin/dist/js/helium-vendors.js') }}"></script>
  <script src="{{ asset('/node_modules/helium-admin/dist/js/helium-base.js') }}"></script>
  <script>
    feather.replace()
  </script>
  <script>
    [].forEach.call(document.querySelectorAll('[data-helium-save]'), function (el) {
        el.addEventListener('click', function (event) {
          event.preventDefault();
          event.stopPropagation(); // if no confirmation
          if (event.target.dataset.confirm && !confirm(event.target.dataset.confirm)) return; // let's submit the form
          var form = document.getElementById(el.dataset.heliumSave);
          if (form) {
            form.submit();
          }
        });
      });


    $('tbody').on('click', '[data-confirm]', function (event) {
            if(event.target.dataset.confirm && !confirm(event.target.dataset.confirm)){
                event.preventDefault();
                event.stopPropagation()
            }
        });
  </script>
  @yield('js')
</body>

</html>
