<?php
$notifKey = 'notif.default';

if (isset($key) && $key) {
    $notifKey = 'notif.' . $key;
}

$notif = session()->get($notifKey);
?>
@if ($notif)
<div data-notif="{{ $notif['level'] }}" style="display:none">
    {{ $notif['message'] }}
</div>
@endif
