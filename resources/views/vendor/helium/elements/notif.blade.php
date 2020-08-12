@foreach ($notifications as $notif)
<div data-notif="{{ $notif['level'] }}" style="display:none">
  {{ $notif['message'] }}
</div>
@endforeach
