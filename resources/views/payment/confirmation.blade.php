<?php
use App\Values\OrderStatus;
SEO::setTitle('Confirmation de la commande');
SEO::setDescription('Commande effectuée avec succès');
?>

@extends('layouts.master')
@section('content')
<div class="container">
    @include('elements.steps', ['step' => 4])
    <div class="container container--small txtcenter">

        @if ($order->status == OrderStatus::PAID)
        <h1>Merci de votre commande !</h1>

        <p>Un e-mail récapitulatif a été envoyé à l’adresse : martin.durand@fai.com.<br/>
        Le courrier peut mettre plusieurs minutes à arriver.</p>
        <p>Si vous ne recevez aucun message, nous vous invitons à consulter votre dossier “courriers indésirables”.</p>
        <p><strong>Votre commande va être traitée dans les plus brefs délais.</strong></p>

        <div class="cart-box">
            <p>Nous vous invitons à vous connecter à votre compte XXX pour effectuer le suivi de la commande.</p>
            <p>Si votre adresse e-mail est erronée, nous vous invitons à vous connecter à l’aide du lien ci-dessous pour le corriger.</p>
            <a class="btn btn--primary" href="{{ route('customer.dashboard') }}">J'accède à mon compte</a>
        </div>
        @else
        <h1>Paiement refusé !</h1>
        @endif

        <a href="{{ route('home') }}">Retourner sur le site</a>
    </div>
</div>
@endsection
