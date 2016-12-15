<?php
SEO::setTitle('Récapitulatif de ma commande');
SEO::setDescription('Les articles de mon panier');
?>

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/node_modules/tingle/dist/tingle.min.css') }}">
@endsection
@extends('layouts.master')
@section('content')

<div class="container">


    <div class="cart">
        <div class="cart-head">
            <h1 class="cart-head__title">Ma commande</h1>
        </div>
        @include('elements.steps', ['step' => 3])
        <div class="titleModule">
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
                    3
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
                    1
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
            <li><button class="btn btn--primary" data-js="paymentButton" data-url="{{ route('payment.success') }}">Carte</button></li>
            <li><button class="btn btn--primary" data-js="paymentButton" data-url="{{ route('payment.success') }}">Virement</button></li>
            <li><button class="btn btn--primary" data-js="paymentButton" data-url="{{ route('payment.success') }}">Chèque</button></li>
        </ul>

        <div class="titleModule">
            <hr/>
        </div>

        <div class="cart-footer">
            <img class="mb2" src="http://placehold.it/300x80" />
            <p>XXX sécurise vos achats par carte avec le système 3D Secure.<br/>
            Vous bénécifiez d'une protection renforcée qui vous protège contre l'utilisation froduleuse de votre carte banquaire.</p>
    </div>
</div>

<div class="cart-paymentModal" data-js="paymentModal">
    <h2>Conditions Générales de Vente</h2>

    <div class="cart-paymentModal__scrollContent">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

    <p><a href="">Télécharger les Conditions Générales de Vente</a></p>
    <p>En cliquant sur "régler ma commande", vous confirmez avoir lu les Conditions Générales de Vente, que vous acceptez sans réserve.</p>
    <a class="btn btn--primary" data-js="validModal" href="">Régler la commande</a>
</div>
@endsection

@section('js')
<script src="{{ asset('/assets/node_modules/tingle/dist/tingle.min.js') }}"></script>
<script src="{{ asset('/assets/js/modules/payment-modal.js') }}"></script>
@endsection
