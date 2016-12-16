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
                                ->value(old('deliveryFirstname',$customer->firstname))
                                ->attr(['v-model' => 'deliveryFirstname'])
                                ->required() !!}

                            {!! Form::create('text', 'deliveryLastname')
                                ->label('Nom')
                                ->value(old('deliveryLastname',$customer->lastname))
                                ->attr(['v-model' => 'deliveryLastname'])
                                ->required() !!}

                        </div>
                        {!! Form::create('text', 'deliveryEmail')
                            ->label('Adresse e-mail')
                            ->value(old('deliveryEmail',$customer->email))
                            ->required()
                            ->attr(['autofocus', 'class' => 'f-100','v-model' => 'deliveryEmail']) !!}

                        <div class="grid-2 grid-1-s">
                            {!! Form::create('text', 'deliveryTelnumber')
                                ->label('Numéro de téléphone')
                                ->value(old('deliveryTelnumber',$customer->deliveryTelnumber))
                                ->attr(['v-model' => 'deliveryTelnumber'])
                                ->required() !!}

                        </div>
                        {!! Form::create('text', 'deliveryAddress')
                            ->label('Adresse')
                            ->value(old('deliveryAddress',$customer->address))
                            ->required()
                            ->attr(['class' => 'f-100','v-model' => 'deliveryAddress']) !!}

                        <div class="grid-2 grid-1-s">
                            {!! Form::create('text', 'deliveryPostcode')
                                ->label('Code postal')
                                ->value(old('deliveryPostcode',$customer->postalcode))
                                ->attr(['v-model' => 'deliveryPostcode'])
                                ->required() !!}

                            {!! Form::create('text', 'deliveryCity')
                                ->label('Ville')
                                ->value(old('deliveryCity',$customer->city))
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
                                {!! Form::create('text', 'firstname')
                                    ->label('Prénom')
                                    ->value(old('firstname',$customer->firstname))
                                    ->attr(['v-model' => 'firstname'])
                                    ->required() !!}

                                {!! Form::create('text', 'lastname')
                                    ->label('Nom')
                                    ->value(old('lastname',$customer->lastname))
                                    ->attr(['v-model' => 'lastname'])
                                    ->required() !!}

                            </div>
                            {!! Form::create('text', 'email')
                                ->label('Adresse e-mail')
                                ->value(old('email',$customer->email))
                                ->required()
                                ->attr(['autofocus', 'class' => 'f-100','v-model' => 'email']) !!}

                            <div class="grid-2 grid-1-s">
                                {!! Form::create('text', 'telnumber')
                                    ->label('Numéro de téléphone')
                                    ->value(old('telnumber',$customer->telnumber))
                                    ->attr(['v-model' => 'telnumber'])
                                    ->required() !!}

                            </div>
                            {!! Form::create('text', 'address')
                                ->label('Adresse')
                                ->value(old('address',$customer->address))
                                ->required()
                                ->attr(['class' => 'f-100','v-model' => 'address']) !!}

                            <div class="grid-2 grid-1-s">
                                {!! Form::create('text', 'postalcode')
                                    ->label('Code postal')
                                    ->value(old('postalcode',$customer->postalcode))
                                    ->attr(['v-model' => 'postalcode'])
                                    ->required() !!}

                                {!! Form::create('text', 'city')
                                    ->label('Ville')
                                    ->value(old('city',$customer->city))
                                    ->attr(['v-model' => 'city'])
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
