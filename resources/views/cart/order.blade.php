<?php
SEO::setTitle('Informations');
SEO::setDescription('Mes informations de livraison et de facturation');
?>

@extends('layouts.master')
@section('content')
<div class="container" >
    @include('elements.steps', ['step' => 2])

    <div data-js="orderVue">
        <form class="" action="{{ route('order.store') }}" method="post">
            <div class="grid-2 grid-1-s">
                <div>
                    <div class="titleModule">
                        <h2>Informations de livraison</h2>
                        <hr/>
                    </div>
                        {{ csrf_field() }}
                        <div class="grid-2 grid-1-s">
                            {!! Form::create('text', 'deliveryFirstname')
                                ->label('Prénom')
                                ->value(old('deliveryFirstname', $customer->firstname))
                                ->attr(['v-model' => 'deliveryFirstname'])
                                ->required() !!}

                            {!! Form::create('text', 'deliveryLastname')
                                ->label('Nom')
                                ->value(old('deliveryLastname', $customer->lastname))
                                ->attr(['v-model' => 'deliveryLastname'])
                                ->required() !!}

                        </div>
                        {!! Form::create('text', 'deliveryEmail')
                            ->label('Adresse e-mail')
                            ->value(old('deliveryEmail', $customer->email))
                            ->required()
                            ->attr(['autofocus', 'class' => 'f-100','v-model' => 'deliveryEmail']) !!}

                        <div class="grid-2 grid-1-s">
                            {!! Form::create('text', 'deliveryPhone')
                                ->label('Numéro de téléphone')
                                ->value(old('deliveryPhone'))
                                ->attr(['v-model' => 'deliveryPhone'])
                                ->required() !!}

                        </div>
                        {!! Form::create('text', 'deliveryAddress')
                            ->label('Adresse')
                            ->value(old('deliveryAddress', $customer->address))
                            ->required()
                            ->attr(['class' => 'f-100','v-model' => 'deliveryAddress']) !!}

                        {!! Form::create('text', 'deliveryAddress2')
                            ->label('Complément d\'adresse')
                            ->value(old('deliveryAddressComplement'))
                            ->attr(['class' => 'f-100','v-model' => 'deliveryAddress2']) !!}

                        <div class="grid-2 grid-1-s">
                            {!! Form::create('text', 'deliveryPostalcode')
                                ->label('Code postal')
                                ->value(old('deliveryPostalcode', $customer->postcode))
                                ->attr(['v-model' => 'deliveryPostalcode'])
                                ->required() !!}

                            {!! Form::create('text', 'deliveryCity')
                                ->label('Ville')
                                ->value(old('deliveryCity', $customer->city))
                                ->attr(['v-model' => 'deliveryCity'])
                                ->required() !!}

                        </div>
                </div>
                <div>
                    <div class="titleModule">
                        <h2>Informations de facturation</h2>
                        <hr/>
                    </div>
                        <div v-bind:class="{ active: diffAddress }">
                            <div class="grid-2 grid-1-s" >
                                {!! Form::create('text', 'billingFirstname')
                                    ->label('Prénom')
                                    ->value(old('billingFirstname', $customer->firstname))
                                    ->attr(['v-model' => 'billingFirstname'])
                                    ->required() !!}

                                {!! Form::create('text', 'billingLastname')
                                    ->label('Nom')
                                    ->value(old('billingLastname', $customer->lastname))
                                    ->attr(['v-model' => 'billingLastname'])
                                    ->required() !!}

                            </div>
                            {!! Form::create('text', 'billingEmail')
                                ->label('Adresse e-mail')
                                ->value(old('billingEmail', $customer->email))
                                ->required()
                                ->attr(['autofocus', 'class' => 'f-100','v-model' => 'billingEmail']) !!}

                            <div class="grid-2 grid-1-s">
                                {!! Form::create('text', 'billingPhone')
                                    ->label('Numéro de téléphone')
                                    ->value(old('billingPhone'))
                                    ->attr(['v-model' => 'billingPhone'])
                                    ->required() !!}

                            </div>
                            {!! Form::create('text', 'billingAddress')
                                ->label('Adresse')
                                ->value(old('billingAddress', $customer->address))
                                ->required()
                                ->attr(['class' => 'f-100','v-model' => 'billingAddress']) !!}

                            {!! Form::create('text', 'billingAddress2')
                                ->label('Complément d\'adresse')
                                ->value(old('billingAddress2'))
                                ->attr(['class' => 'f-100','v-model' => 'billingAddress2']) !!}

                            <div class="grid-2 grid-1-s">
                                {!! Form::create('text', 'billingPostalcode')
                                    ->label('Code postal')
                                    ->value(old('billingPostalcode', $customer->postcode))
                                    ->attr(['v-model' => 'billingPostalcode'])
                                    ->required() !!}

                                {!! Form::create('text', 'billingCity')
                                    ->label('Ville')
                                    ->value(old('billingCity', $customer->city))
                                    ->attr(['v-model' => 'billingCity'])
                                    ->required() !!}

                            </div>
                        </div>
                </div>
            </div>
            {!! Form::create('checkbox', 'diffAddress')
                ->label('Mon adresse de facturation est différente de mon adresse de livraison')
                ->attr(['v-model' => 'diffAddress'])
                ->value(old('diffAddress',false)) !!}


            <div class="titleModule">
                <h2>Choix du transporteur</h2>
                <hr/>
            </div>

            <div class="cart-ship">
                <fieldset class="cart-ship__item">
                    <div class="cart-ship__info">
                        <img class="cart-ship__logo" src="https://placehold.it/80x50" alt="Transporteur"/>
                        <legend class="cart-ship__name">Nom du transporteur (3 à 6 jours environ)</legend>
                    </div>
                    <div class="cart-ship__radioItem">
                        <input type="radio" name="radio" id="radio"> <label for="radio">Livraison à domicile (4,2€)</label>
                    </div>
                    <div class="cart-ship__radioItem">
                        <input type="radio" name="radio" id="radio2"> <label for="radio2">Livraison au point relais (4,2€)</label>
                    </div>
                </fieldset>
                <fieldset class="cart-ship__item">
                    <div class="cart-ship__info">
                        <img class="cart-ship__logo" src="https://placehold.it/80x50" alt="Transporteur"/>
                        <legend class="cart-ship__name">Nom du transporteur (3 à 6 jours environ)</legend>
                    </div>
                    <div class="cart-ship__radioItem">
                        <input type="radio" name="radio" id="radio3"> <label for="radio3">Livraison à domicile (4,2€)</label>
                    </div>
                    <div class="cart-ship__radioItem">
                        <input type="radio" name="radio" id="radio4"> <label for="radio4">Livraison au point relais (4,2€)</label>
                    </div>
                </fieldset>
            </div>

            <div class="titleModule">
                <hr/>
            </div>
            <div class="txtright">
                <button class="btn btn--primary" type="submit">Valider</button>
            </div>
        </form>
    </div>
</div>
@endsection


@section('js')
<script src="{{ asset('/node_modules/vue/dist/vue.min.js') }}"></script>
<script src="{{ asset('/assets/js/pages/order.js') }}"></script>
@endsection
