<?php
SEO::setTitle('Tableau de bord');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<div class="container customer-container">
    <aside class="customer-aside">
        <header class="titleModule">
            <h1>Mon compte</h1>
            <hr/>
        </header>
        <nav class="customer-nav">
            <ul class="customer-nav__list">
                <li class="customer-nav__listItem">
                    <a class="customer-nav__link customer-nav__link--active" href="">Tableau de bord</a>
                </li>
                <li class="customer-nav__listItem">
                    <a class="customer-nav__link" href="{{ route('customer.resetPassword') }}">Modifier mon mot de passe</a>
                </li>
                <li class="customer-nav__listItem">
                    <a class="customer-nav__link" href="">Informations de compte</a>
                </li>
                <li class="customer-nav__listItem">
                    <a class="customer-nav__link" href="">Information personnelles</a>
                </li>
                <li class="customer-nav__listItem">
                    <a class="customer-nav__link" href="{{ route('customer.address.edit') }}">Information de livraison</a>
                </li>
                <li class="customer-nav__listItem">
                    <a class="customer-nav__link" href="">Mes commandes</a>
                </li>
            </ul>
        </nav>
    </aside>
    <section class="customer-customer">
        <div class="titleModule">
            <h1>Tableau de bord</h1>
            <hr/>
        </div>
        <article>
            <p>Bonjour, Prénom !</p>
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
                    <td><a href="">voir le détail</a></td>
                </tr>
                <tr>
                    <td>19287</td>
                    <td>12/05/2016</td>
                    <td>XXX€</td>
                    <td>Livrée</td>
                    <td><a href="">voir le détail</a></td>
                </tr>
            </table>
        </article>

        <div class="grid-2">
            <article>
                <header class="titleModule">
                    <h2>Informations de compte</h2>
                    <hr/>
                </header>
                <p>Prenom Nom<br/>
                    prenom.nom@domain.tld</p>
                <p><a href="">Modifier les préférences</a></p>
            </article>
            <article>
                <header class="titleModule">
                    <h2>Informations de compte</h2>
                    <hr/>
                </header>
                <p>Prenom Nom<br/>
                    3, rue des fleurs<br/>
                    10000 Troyes</p>
                <p><a href="">Modifier mon adresse de livraison</a></p>
            </article>
        </div>
    </section>
</div>
@endsection
