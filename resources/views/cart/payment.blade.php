<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Ma commande</h1>

<div class="">
    Résumé de ma commande
</div>

<ul>
    <li><a href="{{ route('payment.success') }}">Carte</a></li>
    <li><a href="{{ route('payment.success') }}">Virement</a></li>
    <li><a href="{{ route('payment.success') }}">Chèque</a></li>
</ul>
@endsection
