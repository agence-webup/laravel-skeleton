@php
use Webup\LaravelHelium\Core\Helpers\HeliumHelper;
@endphp

<div class="container">
  <div class="navigation">
    @foreach ($menu as $menuItem)
    @if($menuItem->isDropdown)
    <span class="{{ HeliumHelper::current_class($menuItem->currentRoute) }}">
      <i data-feather="{{ $menuItem->icon }}"></i> {{ $menuItem->label }}
      <span class="navigation__sub">
        @foreach($menuItem->urls as $submenuLabel => $submenuLink)
        <a href="{{$submenuLink}}">{{$submenuLabel}}</a>
        @endforeach
      </span>
    </span>
    @else
    <a href="{{ $menuItem->url }}" class="{{ HeliumHelper::current_class($menuItem->currentRoute) }}"><i
        data-feather="{{$menuItem->icon}}"></i> {{ $menuItem->label }}</a>
    @endif
    @endforeach
  </div>
</div>
