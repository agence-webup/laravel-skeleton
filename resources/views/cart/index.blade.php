<?php
SEO::setTitle('Récapitulatif de ma commande');
SEO::setDescription('Les articles de mon panier');
?>

@section('css')
    <link rel="stylesheet" href="{{ asset('/bower/tingle/dist/tingle.min.css') }}">
@endsection
@extends('layouts.master')
@section('content')

<div class="container">
    @include('elements.steps', ['step' => 1])
    <div class="cart">
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
            <tr>
                <td class="cart-product__item">
                    <img class="cart-product__image" src="https://placehold.it/100x100" alt="">
                    <div class="cart-product__content">
                        <strong class="cart-product__name">Nom et/ou référence de l'article</strong>
                        <a class="cart-product__link" href="">voir l'article</a>
                    </div>
                </td>
                <td class="s-hidden">XXX,XX€</td>
                <td class="txtcenter cart-amount">
                    <input class="cart-amount__imput" type="number" name="">
                    <a class="cart-amount__link" href="">&#128465; supprimer
                </td>
                <td>XXX,XX€</td>
            </tr>
            <tr>
                <td class="cart-product__item">
                    <img class="cart-product__image" src="https://placehold.it/100x100" alt="">
                    <div class="cart-product__content">
                        <strong class="cart-product__name">Nom et/ou référence de l'article</strong>
                        <a class="cart-product__link" href="">voir l'article</a>
                    </div>
                </td>
                <td class="s-hidden">XXX,XX€</td>
                <td class="txtcenter cart-amount">
                    <input class="cart-amount__imput" type="number" name="">
                    <a class="cart-amount__link" href="">&#128465; supprimer
                </td>
                <td>XXX,XX€</td>
            </tr>
        </table>

        <div class="cart-promo">
            <label for="cart-promo">Entrez votre code promo</label>
            <div class="cart-promo__form">
                <input type="text" name="cart-promo">
                <button class="btn btn-primary" type="submit">ajouter</button>
            </div>
        </div>

        <table class="cart-table">
            <thead>
                <tr>
                    <th class="w80">Type de réduction</th>
                    <th>Valeur</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tr>
                <td>Réduction</td>
                <td class="s-hidden">-XX%</td>
                <td>-XX€</td>
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
                <strong>XXX,XX€</strong>
            </div>
        </div>

        <div class="cart-action">
            <div>
                <a class="btn btn--secondary" href="">continuer mes achats</a>
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
<script src="{{ asset('/bower/tingle/dist/tingle.min.js') }}"></script>
<script src="{{ asset('/assets/js/modules/order-modal.js') }}"></script>
@endsection