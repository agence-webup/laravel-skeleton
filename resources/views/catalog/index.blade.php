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
            <div class="catalog-filter__box">
                <h2 class="catalog-filter__boxTitle catalog-filter__boxTitle--open">Catégories</h2>
                <fieldset class="catalog-filter__checkbox">
                    <legend>Polos</legend>
                    <ul class="catalog-filter__checkboxList">
                      <li class="catalog-filter__checkboxListItem">
                          <input type="checkbox" id="cb1" value="courte" />
                          <label class="catalog-filter__checkboxListLabel" for="cb1">Manches courtes</label>
                      </li>
                      <li class="catalog-filter__checkboxListItem">
                          <input type="checkbox" id="cb2" value="moyenne" />
                          <label class="catalog-filter__checkboxListLabel" for="cb2">Manches moyennes</label>
                      </li>
                      <li class="catalog-filter__checkboxListItem">
                          <input type="checkbox" id="cb3" value="longue" />
                          <label class="catalog-filter__checkboxListLabel" for="cb3">Manches longues</label>
                      </li>
                    </ul>
                </fieldset>
            </div>
            <div class="catalog-filter__box">
                <h2 class="catalog-filter__boxTitle">Catégories</h2>
            </div>

            <div class="catalog-filter__box">
                <h2 class="catalog-filter__boxTitle catalog-filter__boxTitle--open">Catégories</h2>
                <ul class="catalog-filter__colorList">
                    <li class="catalog-filter__colorListItem">
                        <input class="catalog-filter__colorBox" type="checkbox" id="c1" value="couleur1" />
                        <label class="catalog-filter__colorLabel" for="c1" style="background-color: #ff0000">Red</label>
                    </li>
                    <li class="catalog-filter__colorListItem">
                        <input class="catalog-filter__colorBox" type="checkbox" id="c1" value="couleur1" />
                        <label class="catalog-filter__colorLabel" for="c1" style="background-color: #3bff00">Green</label>
                    </li>
                    <li class="catalog-filter__colorListItem">
                        <input class="catalog-filter__colorBox" type="checkbox" id="c1" value="couleur1" />
                        <label class="catalog-filter__colorLabel" for="c1" style="background-color: #0021ff">Blue</label>
                    </li>
                    <li class="catalog-filter__colorListItem">
                        <input class="catalog-filter__colorBox" type="checkbox" id="c1" value="couleur1" />
                        <label class="catalog-filter__colorLabel" for="c1" style="background-color: #000">Black</label>
                    </li>
                    <li class="catalog-filter__colorListItem">
                        <input class="catalog-filter__colorBox" type="checkbox" id="c1" value="couleur1" />
                        <label class="catalog-filter__colorLabel" for="c1" style="background-color: #fff">White</label>
                    </li>
                </ul>
            </div>
        </aside>
        <section class="catalog-content">
            <div class="catalog-content__head">
                <h2 class="catalog-content__headTitle">Catégorie de produit</h2>
                <span class="catalog-content__headSubTitle">(8 résultats)</span>
            </div>
            <div class="catalog-classify">

                <button class="catalog-classify__mobileFilter hidden-s-up">Filtrer</button>

                <label class="catalog-classify__label" for="classify">Trier par</label>
                <select class="catalog-classify__select">
                    <option disabled selected hidden>Trier par</option>
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                </select>

            </div>
            <div class="catalog-grid-product">
                @foreach ($products as $product)
                <a class="catalog-product__item" href="{{ route('catalog.product', ['slug' => $product->slug]) }}">
                    <div class="catalog-product__image">
                        <img src="http://placehold.it/200x250" alt="Product"/>
                    </div>
                    <h3 class="catalog-product__name">{{ $product->title }}</h3>
                    <div class="catalog-product__info">Des infos suplémentaires</div>
                    <div class="catalog-product__price">
                        <div class="catalog-product__priceItem">11€</div>
                        <div class="catalog-product__priceItem catalog-product__priceItem--reduct">14,90€</div>
                    </div>
                </a>
                @endforeach
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
