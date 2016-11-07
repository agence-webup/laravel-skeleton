<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Mes factures</h1>

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
            <td>15/03/2016</td>
            <td>139,73 €</td>
            <td>Expédié</td>
            <td><a href="{{ route('customer.order.show', ['id' => 0]) }}">Voir les détails</a></td>
        </tr>
    </tbody>
</table>
@endsection
