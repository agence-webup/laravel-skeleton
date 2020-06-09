<nav class="navigation-wrapper">
  <div class="container">
    <div class="navigation">
      <a href="{{ route('admin.home') }}" class="{{ current_class('admin.home',"is-active") }}"><i
          data-feather="home"></i> Dashboard</a>

      <a href="{{ route('admin.redirection.index') }}" class="{{ current_class('admin.redirection',"is-active") }}"><i
          data-feather="repeat"></i> Redirections</a>


      {{-- Helium Crud --}}
      {{-- Don't remove previous line if you are using larave-helium crud generator --}}
    </div>
  </div>
</nav>
