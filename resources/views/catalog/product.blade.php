<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/node_modules/tingle/dist/tingle.min.css') }}">
@endsection
@section('content')
<h1>{{ $product->name }}</h1>

<div class="container">

    <div class="product-breadcrumb">
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

    <div class="product-content" itemscope itemtype="http://schema.org/Product">
        <div class="product-preview">
            <ul class="product-views">
                <li class="product-views__item">
                    <button class="product-view__btn">Prev</button>
                </li>
                <li class="product-views__item">
                    <a class="product-views__itemLink" href="">
                        <img class="product-views__itemImage" src="https://placehold.it/150x150" />
                    </a>
                </li>
                <li class="product-views__item">
                    <a class="product-views__itemLink" href="">
                        <img class="product-views__itemImage" src="https://placehold.it/150x150" />
                    </a>
                </li>
                <li class="product-views__item">
                    <a class="product-views__itemLink" href="">
                        <img class="product-views__itemImage" src="https://placehold.it/150x150" />
                    </a>
                </li>
                <li class="product-views__item">
                    <button class="product-view__btn">Next</button>
                </li>
            </ul>
            <div class="product-visual">
                <img class="product-visual__image" itemprop="image" src="https://placehold.it/600x600" />
            </div>
        </div>
        <form class="product-info">
            <h1 class="product-info__name" itemprop="name">Product name</h1>
            <div class="product-info__ref" itemprop="mpn">Reference</div>
            <div class="product-info__price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                <meta itemprop="priceCurrency" content="EUR" /><!-- cf ISO_4217 codes -->
                <div class="product-info__priceItem" itemprop="price">11€</div>
                <div class="product-info__priceItem product-info__priceItem--reduct">14,90€</div>
            </div>
            <ol class="product-option">
                <li class="product-option__item">
                    Une déclinaison
                    <div class="product-option__content">
                        <span itemprop="isSimilarTo" itemscope itemtype="http://schema.org/Product">
                            <a class="product-option__contentItem" itemprop="url" href="">Decli 1</a>
                        </span>
                        <span itemprop="isSimilarTo" itemscope itemtype="http://schema.org/Product">
                            <a class="product-option__contentItem" itemprop="url" href="">Decli 2</a>
                        </span>
                        <span itemprop="isSimilarTo" itemscope itemtype="http://schema.org/Product">
                            <a class="product-option__contentItem" itemprop="url" href="">Decli 3</a>
                        </span>
                    </div>
                </li>
                <li class="product-option__item">
                    Une selection d'option
                    <div class="product-option__content">
                        <radiogroup>
                            <input type="radio" name="option" value="value" id="value1" class="product-option__contentItem" />
                            <label for="value1">Option 1</label>
                            <input type="radio" name="option" value="value" id="value2" class="product-option__contentItem" />
                            <label for="value2">Option 2</label>
                            <input type="radio" name="option" value="value" id="value3" class="product-option__contentItem" />
                            <label for="value3">Option 3</label>
                        </radiogroup>
                    </div>
                </li>
            </ol>
            <div class="product-about" itemprop="description">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="product-submit">
                <span class="product-submit__info">Plus que <strong>20€</strong> avant de bénéficier des frais de port gratuits.</span>
                <button class="product-submit__btn btn btn--primary" data-js="productButton" role="button">Ajouter au panier</button>
            </div>
        </form>
        <div class="product-suggest">
            <div class="titleModule">
                <h1>Produits similaires</h1>
                <hr/>
            </div>
            <ul class="product-suggest__list grid-3">
                <li class="product-suggest__item" itemprop="isRelatedTo" itemscope itemtype="http://schema.org/Product">
                    <a href="product-suggest__link" itemprop="url" href="">
                        <img class="product-suggest__image" src="https://placehold.it/200x200" />
                    </a>
                </li>
                <li class="product-suggest__item" itemprop="isRelatedTo" itemscope itemtype="http://schema.org/Product">
                    <a href="product-suggest__link" itemprop="url" href="">
                        <img class="product-suggest__image" src="https://placehold.it/200x200" />
                    </a>
                </li>
                <li class="product-suggest__item" itemprop="isRelatedTo" itemscope itemtype="http://schema.org/Product">
                    <a href="product-suggest__link" itemprop="url" href="">
                        <img class="product-suggest__image" src="https://placehold.it/200x200" />
                    </a>
                </li>
            </ul>
        </div>
        <div class="product-moreInfo">
            <div class="product-moreInfo__item">
                <div class="titleModule">
                    <h1>Description</h1>
                    <hr/>
                </div>
                <div class="product-moreInfo__about" itemprop="description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <p> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="product-moreInfo__item">
                <div class="titleModule">
                    <h1>Info suplémentaire</h1>
                    <hr/>
                </div>
                <div class="product-moreInfo__about">
                    <ul>
                        <li>key: <strong>value</strong></li>
                        <li>key: <strong>value</strong></li>
                        <li>key: <strong>value</strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-cartModal" data-js="productModal">
    <div class="titleModule">
        <h2>Vous avez ajouté un article à votre panier</h2>
        <hr/>
    </div>
    <div class="product-cartModal__content">
        <div class="product-cartModal__visual">
            <img src="http://placehold.it/200x200" alt="" />
        </div>
        <div class="product-cartModal__info">
            <h2 class="product-cartModal__name">Nom du produit</h2>
            <div class="product-cartModal__about">
                Déclinaison: <strong>bleu</strong><br/>
                Taille: <strong>L</strong>
            </div>
            <div class="product-cartModal__quantity">
                <label for="productQuantity">Quantité</label>
                <input class="product-cartModal__quantityInput" type="number" name="productQuantity" id="productQuantity"/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('/assets/node_modules/tingle/dist/tingle.min.js') }}"></script>
<script src="{{ asset('/assets/js/modules/product-modal.js') }}"></script>
<script>

var productModal = new ProductModal({cartLink: '{{ route('cart.index') }}'});

</script>
@endsection
