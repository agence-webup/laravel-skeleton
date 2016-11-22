<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<div class="container customer-container">
    @include('customer.elements.aside')
    <section class="customer-content">
        <div class="titleModule">
            <h1>Mes factures</h1>
            <hr/>
        </div>
        <article>
            <table class="customer-table">
                <thead>
                    <tr>
                        <th>Numéro de commande</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Statut de la commande</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="customer-order__id"><span class="hidden-s-up">Commande #</span>2143</td>
                        <td class="customer-order__date"><span class="hidden-s-up">du </span>15/07/2016</td>
                        <td class="customer-order__price">139,73 €</td>
                        <td class="customer-order__status">En cours</td>
                        <td class="customer-order__info">
                            <a class="customer-order__infoLink" href="{{ route('customer.order.show', ['id' => 0]) }}">Voir les détails</a>
                        </td>                    </tr>
                    <tr>
                        <td class="customer-order__id"><span class="hidden-s-up">Commande #</span>2143</td>
                        <td class="customer-order__date"><span class="hidden-s-up">du </span>15/07/2016</td>                        <td class="customer-order__price">139,73 €</td>
                        <td class="customer-order__status">En cours</td>
                        <td class="customer-order__info">
                            <a class="customer-order__infoLink" href="{{ route('customer.order.show', ['id' => 0]) }}">Voir les détails</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </article>
    </section>
</div>
@endsection
