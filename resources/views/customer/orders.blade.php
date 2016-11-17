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
            <table>
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
                        <td>2143</td>
                        <td>15/07/2016</td>
                        <td>139,73 €</td>
                        <td>En cours</td>
                        <td><a href="{{ route('customer.order.show', ['id' => 0]) }}">Voir les détails</a></td>
                    </tr>
                    <tr>
                        <td>2143</td>
                        <td>21/03/2016</td>
                        <td>139,73 €</td>
                        <td>Expédié</td>
                        <td><a href="{{ route('customer.order.show', ['id' => 0]) }}">Voir les détails</a></td>
                    </tr>
                </tbody>
            </table>
        </article>
    </section>
</div>
@endsection
