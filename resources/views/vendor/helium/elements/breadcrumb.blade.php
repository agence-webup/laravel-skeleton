<div class="navigation-breadcrumb">
  <div class="container">
    <div class="breadcrumb">
      <ol>
        @foreach ($items as $key => $item)
        <li>
          @if($key+1 == count($items))
          <span>{{ $item->label }}</span>
          @else
          <a href="{{ $item->link }}">{{ $item->label }}</a>
          @endif
        </li>
        @endforeach
      </ol>
    </div>
  </div>
</div>
