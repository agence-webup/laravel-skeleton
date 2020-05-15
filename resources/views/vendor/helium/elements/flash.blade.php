<?php
$flashKey = 'flash.default';

if (isset($key) && $key) {
    $flashKey = 'flash.' . $key;
}

$flash = session()->get($flashKey);
?>
@if ($flash)
<div class="alert alert--{{ $flash['level'] }}">
    {{ $flash['message'] }}
</div>
@endif
