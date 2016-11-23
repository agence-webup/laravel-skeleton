<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Liste de produits</h1>

<div class="container">
    <div class="catalog-breadcrumb">
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

    <div class="catalog-container">
        <aside class="catalog-filter">
            Filtres
        </aside>
        <section class="catalog-content">
            <div class="catalog-content__head">
                <h1 class="catalog-content__headTitle">Catégorie de produit</h1>
                <span class="catalog-content__headSubTitle">(8 résultats)</span>
            </div>
            <div class="catalog-grid-product">
                <a class="catalog-product__item" href="">
                    <div class="catalog-product__image">
                        <img src="http://placehold.it/200x250" alt="Product"/>
                    </div>
                    <h2 class="catalog-product__name">Nom du produit</h2>
                    <div class="catalog-product__info">Des infos suplémentaires</div>
                    <div class="catalog-product__price">
                        <div class="catalog-product__priceItem">11€</div>
                        <div class="catalog-product__priceItem catalog-product__priceItem--reduct">14,90€</div>
                    </div>
                </a>
                <a class="catalog-product__item" href="">
                    <div class="catalog-product__image">
                        <img src="http://placehold.it/200x250" alt="Product"/>
                    </div>
                    <h2 class="catalog-product__name">Nom du produit qui prend deux lignes</h2>
                    <div class="catalog-product__info">Des infos suplémentaires</div>
                    <div class="catalog-product__price">
                        <div class="catalog-product__priceItem">11€</div>
                        <div class="catalog-product__priceItem catalog-product__priceItem--reduct">14,90€</div>
                    </div>
                </a>
                <a class="catalog-product__item" href="">
                    <div class="catalog-product__image">
                        <img src="http://placehold.it/200x250" alt="Product"/>
                    </div>
                    <h2 class="catalog-product__name">Nom du produit qui peut prendre plusieurs lignes</h2>
                    <div class="catalog-product__info">Des infos suplémentaires</div>
                    <div class="catalog-product__price">
                        <div class="catalog-product__priceItem">11€</div>
                        <div class="catalog-product__priceItem catalog-product__priceItem--reduct">14,90€</div>
                    </div>
                </a>
                <a class="catalog-product__item" href="">
                    <div class="catalog-product__image">
                        <img src="http://placehold.it/200x250" alt="Product"/>
                    </div>
                    <h2 class="catalog-product__name">Nom du produit qui peut prendre plusieurs lignes</h2>
                    <div class="catalog-product__info">Des infos suplémentaires</div>
                    <div class="catalog-product__price">
                        <div class="catalog-product__priceItem">11€</div>
                        <div class="catalog-product__priceItem catalog-product__priceItem--reduct">14,90€</div>
                    </div>
                </a>
                <a class="catalog-product__item" href="">
                    <div class="catalog-product__image">
                        <img src="http://placehold.it/200x250" alt="Product"/>
                    </div>
                    <h2 class="catalog-product__name">Nom du produit qui peut prendre plusieurs lignes</h2>
                    <div class="catalog-product__info">Des infos suplémentaires</div>
                    <div class="catalog-product__price">
                        <div class="catalog-product__priceItem">11€</div>
                        <div class="catalog-product__priceItem catalog-product__priceItem--reduct">14,90€</div>
                    </div>
                </a>
                <a class="catalog-product__item" href="">
                    <div class="catalog-product__image">
                        <img src="http://placehold.it/200x250" alt="Product"/>
                    </div>
                    <h2 class="catalog-product__name">Nom du produit qui peut prendre plusieurs lignes</h2>
                    <div class="catalog-product__info">Des infos suplémentaires</div>
                    <div class="catalog-product__price">
                        <div class="catalog-product__priceItem">11€</div>
                        <div class="catalog-product__priceItem catalog-product__priceItem--reduct">14,90€</div>
                    </div>
                </a>
            </div>
        </section>
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
