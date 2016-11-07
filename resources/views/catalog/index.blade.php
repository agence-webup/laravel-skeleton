<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Liste de produits</h1>

<div class="">
    @foreach ($products as $product)
    <div class="">
        <a href="{{ route('catalog.product', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
    </div>
    @endforeach
</div>
@endsection
