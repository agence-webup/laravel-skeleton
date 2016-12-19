<?php
SEO::setTitle('Récapitulatif de ma commande');
SEO::setDescription('Les articles de mon panier');
?>

@extends('layouts.master')
@section('content')

<div class="container">
    <div class="cart" data-js="cartVue">
        <div class="cart-action cart-action--top">
            <div>
                <a class="btn btn--secondary" href="">continuer mes achats</a>
            </div>
            <div>
                <a class="btn btn--primary" href="{{ route('order.create') }}" data-js="orderButton" data-open="{{ Auth::guest() }}">Finaliser ma commande &rarr;</a>
            </div>
        </div>

        <div class="cart-head">
            <h1 class="cart-head__title">Ma commande</h1>
            <span class="cart-head__info">Info&nbsp;: Il vous reste XX€ avant de bénéficier des frais de port offerts</span>
        </div>

        <table class="cart-table cart-product">
            <thead>
                <tr>
                    <th class="w50">Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
                    <th>Sous-total</th>
                </tr>
            </thead>
            <tr v-for="product in cart.products">
                <td class="cart-product__item">
                    <img class="cart-product__image" :src="product.image" alt="">
                    <div class="cart-product__content">
                        <strong class="cart-product__name">@{{ product.name }}</strong>
                        <a class="cart-product__link" :href="product.link">voir l'article</a>
                    </div>
                </td>
                <td class="s-hidden">@{{ product.taxedPrice | price }}</td>
                <td class="txtcenter cart-amount">
                    <input class="cart-amount__imput" type="number" v-model="product.quantity" v-on:change.prevent="update(product)">
                    <a class="cart-amount__link" href="" v-on:click.prevent="remove(product)">&#128465; supprimer
                </td>
                <td>@{{ product.totalTaxedPrice | price }}</td>
            </tr>
        </table>

        <div class="cart-promo">
            <label for="cart-promo">Entrez votre code promo</label>
            <div class="cart-promo__form">
                <input type="text" name="cart-promo" v-model='couponCode'>
                <button class="btn btn-primary cart-promo__btn" type="submit" v-on:click="useCoupon">ajouter</button>
            </div>
        </div>

        <table class="cart-table">
            <thead>
                <tr>
                    <th class="w80">Type de réduction</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tr v-for="discount in cart.discounts">
                <td>@{{ discount.name }}</td>
                <td>@{{ discount.amount | price }}</td>
            </tr>
        </table>

        <div class="cart-total">
            <div class="cart-total__subtotal">
                <span>Sous-total</span>
                <span>XXX,XX€</span>
            </div>
            <div class="cart-total__subtotal">
                <span>Frais de port estimés</span>
                <span>XX,XX€</span>
            </div>
            <div class="cart-total__subtotal">
                <span>Total</span>
                <strong>@{{ cart.taxedPrice | price }}</strong>
            </div>
        </div>

        <div class="cart-action">
            <div>
                <a class="btn btn--secondary cart-action__btnMobile" href="">continuer mes achats</a>
            </div>
            <div>
                <a class="btn btn--primary" href="{{ route('order.create') }}" data-js="orderButton" data-open="{{ Auth::guest() }}">Finaliser ma commande &rarr;</a>
            </div>
        </div>

        <div class="cart-orderModal" data-js="orderModal">
            <div class="mb2">
                <a class="btn btn--primary" href="{{ route('customer.login') }}">J'ai déjà un compte</a>
            </div>
            <div>
                <a class="btn btn--primary" href="{{ route('order.create') }}">Je n'ai pas de compte</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('/node_modules/vue/dist/vue.min.js') }}"></script>
<script src="{{ asset('/node_modules/tingle.js/dist/tingle.min.js') }}"></script>
<script src="{{ asset('/assets/js/modules/cart-service.js') }}"></script>
<script src="{{ asset('/assets/js/pages/cart.js') }}"></script>
<script src="{{ asset('/assets/js/modules/order-modal.js') }}"></script>
@endsection
