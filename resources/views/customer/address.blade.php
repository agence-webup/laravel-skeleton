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
            <h1>Mon adresse</h1>
            <hr/>
        </div>
        <article>
            <form class="" action="{{ route('customer.address.update') }}" method="post">
                    <div class="customer-formContent">
                    {{ csrf_field() }}

                    <div class="grid-2">
                        {!! Form::create('text', 'firstname')->label('Prénom')->value($auth->firstname) !!}
                        {!! Form::create('text', 'lastname')->label('Nom')->value($auth->lastname) !!}
                    </div>
                    {!! Form::create('text', 'address')->label('Adresse')->attr(['class' => 'f-100'])->value($auth->address) !!}
                    {!! Form::create('text', 'postcode')->label('Code postal')->attr(['class' => 'f-100'])->value($auth->postcode) !!}
                    {!! Form::create('text', 'city')->label('Ville')->attr(['class' => 'f-100'])->value($auth->city) !!}

                    <button class="btn btn--primary" type="submit">Enregistrer</button>
                </div>
            </form>
        </article>
    </section>
</div>
@endsection
