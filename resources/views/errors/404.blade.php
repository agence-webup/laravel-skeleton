<?php
SEO::setTitle('Page not found');
?>

@extends('layouts.errors')
@section('content')
<h1>Page Not Found</h1>
<p>Sorry, but the page you were trying to view does not exist.</p>
<div class="actions">
    <a href="/" class="btn btn--primary">go back to homepage</a>
</div>
@endsection
