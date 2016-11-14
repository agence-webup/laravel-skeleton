<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<div class="container">
    @include('elements.steps', ['step' => 2])

    <form class="" action="{{ route('order.store') }}" method="post">
        <div class="grid-2">
            <div>
                <div class="cart-moduleTitle">
                    <h2>Informations de livraison</h2>
                    <hr/>
                </div>
                    {{ csrf_field() }}
                    <div class="grid-2">
                        {!! Form::create('text', 'firstname')->label('Prénom')->value($customer->firstname)->required() !!}
                        {!! Form::create('text', 'lastname')->label('Nom')->value($customer->lastname)->required() !!}
                    </div>
                    {!! Form::create('text', 'email')->label('Adresse e-mail')->value($customer->email)->required()->attr(['autofocus', 'class' => 'f-100']) !!}
                    <div class="grid-2">
                        {!! Form::create('text', 'telnumber')->label('Numéro de téléphone')->value($customer->telnumber)->required() !!}
                    </div>
                    {!! Form::create('text', 'address')->label('Adresse')->value($customer->address)->required()->attr(['class' => 'f-100']) !!}
                    <div class="grid-2">
                        {!! Form::create('text', 'postalcode')->label('Code postal')->value($customer->postalcode)->required() !!}
                        {!! Form::create('text', 'city')->label('Ville')->value($customer->city)->required() !!}
                    </div>
            </div>
            <div>
                <div class="cart-moduleTitle">
                    <h2>Informations de facturation</h2>
                    <hr/>
                </div>
                    {{ csrf_field() }}
                    <div class="grid-2">
                        {!! Form::create('text', 'firstname')->label('Prénom')->value($customer->firstname)->required() !!}
                        {!! Form::create('text', 'lastname')->label('Nom')->value($customer->lastname)->required() !!}
                    </div>
                    {!! Form::create('text', 'email')->label('Adresse e-mail')->value($customer->email)->required()->attr(['autofocus', 'class' => 'f-100']) !!}
                    <div class="grid-2">
                        {!! Form::create('text', 'telnumber')->label('Numéro de téléphone')->value($customer->telnumber)->required() !!}
                    </div>
                    {!! Form::create('text', 'address')->label('Adresse')->value($customer->address)->required()->attr(['class' => 'f-100']) !!}
                    <div class="grid-2">
                        {!! Form::create('text', 'postalcode')->label('Code postal')->value($customer->postalcode)->required() !!}
                        {!! Form::create('text', 'city')->label('Ville')->value($customer->city)->required() !!}
                    </div>
            </div>
        </div>
        {!! Form::create('checkbox', 'diffAddress')->label('Mon adresse de facturation est différente de mon adresse de livraison')->value(false)->required() !!}

        <div class="cart-moduleTitle">
            <h2>Choix du transporteur</h2>
            <hr/>
        </div>

        <div class="cart-ship">
            <fieldset class="cart-ship__item">
                <div class="cart-ship__info">
                    <img class="cart-ship__logo" src="https://placehold.it/80x50" alt="Transporteur"/>
                    <legend class="cart-ship__name">Nom du transporteur</legend>
                </div>
                <div class="cart-ship__radioItem">
                    <input type="radio" name="radio" id="radio"> <label for="radio">Livraison à domicile</label>
                </div>
                <div class="cart-ship__radioItem">
                    <input type="radio" name="radio" id="radio2"> <label for="radio2">Livraison au point relais</label>
                </div>
            </fieldset>
            <fieldset class="cart-ship__item">
                <div class="cart-ship__info">
                    <img class="cart-ship__logo" src="https://placehold.it/80x50" alt="Transporteur"/>
                    <legend class="cart-ship__name">Nom du transporteur</legend>
                </div>
                <div class="cart-ship__radioItem">
                    <input type="radio" name="radio" id="radio3"> <label for="radio3">Livraison à domicile</label>
                </div>
                <div class="cart-ship__radioItem">
                    <input type="radio" name="radio" id="radio4"> <label for="radio4">Livraison au point relais</label>
                </div>
            </fieldset>
        </div>
        
        <div class="cart-moduleTitle">
            <hr/>
        </div>
        <div class="txtright">
            <button class="btn btn--primary" type="submit">Valider</button>
        </div>
    </form>
</div>
@endsection
