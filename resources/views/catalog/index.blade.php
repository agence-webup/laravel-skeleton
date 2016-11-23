<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Liste de produits</h1>

<div class="container">
    <div class="catalog__breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb__listiItem">
                <a href="" class="breadcrumb__itemContent">Item</a>
            </li>
            <li class="breadcrumb__listiItem">
                <a href="" class="breadcrumb__itemContent">Item</a>
            </li>
            <li class="breadcrumb__listiItem">
                <a href="" class="breadcrumb__itemContent">Item</a>
            </li>
            <li class="breadcrumb__listiItem">
                <span class="breadcrumb__itemContent">Current item</span>
            </li>
        </ul>
    </div>

    <div class="">
        @foreach ($products as $product)
        <div class="">
            <a href="{{ route('catalog.product', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
        </div>
        @endforeach
    </div>

</div>
@endsection
