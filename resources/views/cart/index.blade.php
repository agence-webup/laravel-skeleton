<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Ma commande</h1>


<div class="">
    Liste des produits
</div>

<a href="{{ route('order.create') }}" data-js="orderButton" data-open="{{ Auth::guest() }}">Commander</a>

<div data-js="orderModal">
    <div>
        <a href="{{ route('customer.login') }}">J'ai déjà un compte</a>
    </div>
    <div>
        <a href="{{ route('order.create') }}">Je n'ai pas de compte</a>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('/bower/tingle/dist/tingle.min.js') }}"></script>
<script src="{{ asset('/assets/js/modules/order-modal.js') }}"></script>
@endsection
