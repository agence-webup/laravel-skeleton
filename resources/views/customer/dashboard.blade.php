<?php
SEO::setTitle('Tableau de bord');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<div class="container customer-container">
    @include('customer.elements.aside')
    <section class="customer-content">
        <div class="titleModule">
            <h1>Tableau de bord</h1>
            <hr/>
        </div>
        <article>
            <p>Bonjour, {{ $auth->firstname }} !</p>
            <p>Bienvenue sur votre compte client.<br/>
            Depuis le tableau de bord, pous pouvez visualiser en un coup d'oeil vos activités, voir et modifier vos informations personnelles.</p>
        </article>
        <article class="customer-hidden-s">
            <table>
                <thead>
                    <tr>
                        <th>Numéro de commande</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Statut de la commande</th>
                        <th></th>
                    </tr>
                </thead>
                <tr>
                    <td>21536</td>
                    <td>21/12/2016</td>
                    <td>XXX€</td>
                    <td>En cours de livraison</td>
                    <td><a href="{{ route('customer.order.show', ['id' => 0]) }}">voir le détail</a></td>
                </tr>
                <tr>
                    <td>19287</td>
                    <td>12/05/2016</td>
                    <td>XXX€</td>
                    <td>Livrée</td>
                    <td><a href="{{ route('customer.order.show', ['id' => 0]) }}">voir le détail</a></td>
                </tr>
            </table>
        </article>

        <div class="grid-2 customer-hidden-s">
            <article>
                <header class="titleModule">
                    <h2>Informations de compte</h2>
                    <hr/>
                </header>
                <p>{{ $auth->firstname }} {{ $auth->lastname }}<br/>
                    {{ $auth->email }}</p>
                <p><a href="">Modifier les préférences</a></p>
            </article>
            <article>
                <header class="titleModule">
                    <h2>Informations de compte</h2>
                    <hr/>
                </header>
                <p>{{ $auth->firstname }} {{ $auth->lastname }}<br/>
                    {{ $auth->address }}<br/>
                    {{ $auth->postcode }} {{ $auth->city }}</p>
                <p><a href="">Modifier mon adresse de livraison</a></p>
            </article>
        </div>
    </section>
</div>
@endsection
