@if(count($shortcuts) > 0)
<div class="header__navItem">
  <div class="dropmic" data-dropmic="header-nav-actions" data-dropmic-direction="bottom-left" role="navigation">
    <button class="btn--dropdown" data-dropmic-btn>Actions rapides</button>
    <div class="dropmic-menu" aria-hidden="true">
      <ul class="dropmic-menu__list" role="menu">
        @foreach ($shortcuts as $shortcutContainer)
        @foreach ($shortcutContainer as $shortcut)
        <a class="dropmic-menu__listContent" href="{{ $shortcut->link }}" tabindex="-1">{{ $shortcut->label }}</a>
        @endforeach
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endif
