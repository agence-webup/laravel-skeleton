<?php
SEO::setTitle('Récapitulatif de ma commande');
SEO::setDescription('Les articles de mon panier');
?>

@extends('layouts.master')
@section('content')

<div class="container">


    <div class="cart">
        <div class="cart-head">
            <h1 class="cart-head__title">Ma commande</h1>
        </div>
        @include('elements.steps', ['step' => 3])
        <div class="cart-moduleTitle">
            <h2>Résumé de ma commande</h2>
            <hr/>
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

        <div class="cart-total">
            <div class="cart-total__subtotal">
                <span>Sous-total</span>
                <span>XXX,XX€</span>
            </div>
            <div class="cart-total__subtotal">
                <span>Frais de port (nom du transporteur)</span>
                <span>XX,XX€</span>
            </div>
            <div class="cart-total__subtotal">
                <span>Total</span>
                <strong>XXX,XX€</strong>
            </div>
        </div>

        <ul class="cart-action">
            <li><a class="btn btn--primary" href="{{ route('payment.success') }}">Carte</a></li>
            <li><a class="btn btn--primary" href="{{ route('payment.success') }}">Virement</a></li>
            <li><a class="btn btn--primary" href="{{ route('payment.success') }}">Chèque</a></li>
        </ul>

        <div class="cart-orderModal" data-js="orderModal">
            <div class="mb2">
                <a class="btn btn--primary" href="{{ route('customer.login') }}">J'ai déjà un compte</a>
            </div>
            <div>
                <a class="btn btn--primary" href="{{ route('order.create') }}">Je n'ai pas de compte</a>
            </div>
        </div>

        <div class="cart-moduleTitle">
            <hr/>
        </div>

        <div class="cart-footer">
            <img class="mb2" src="http://placehold.it/300x80" />
            <p>XXX sécurise vos achats par carte avec le système 3D Secure.<br/>
            Vous bénécifiez d'une protection renforcée qui vous protège contre l'utilisation froduleuse de votre carte banquaire.</p>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('/bower/tingle/dist/tingle.min.js') }}"></script>
<script src="{{ asset('/assets/js/modules/order-modal.js') }}"></script>
@endsection
