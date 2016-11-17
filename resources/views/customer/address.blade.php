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
                        {!! Form::create('text', 'name')->label('Prénom') !!}
                        {!! Form::create('text', 'lastname')->label('Nom') !!}
                    </div>
                    {!! Form::create('text', 'address')->label('Adresse')->attr(['class' => 'f-100']) !!}
                    {!! Form::create('text', 'zipcode')->label('Code postal')->attr(['class' => 'f-100']) !!}
                    {!! Form::create('text', 'city')->label('Ville')->attr(['class' => 'f-100']) !!}

                    <button class="btn btn--primary" type="submit">Enregistrer</button>
                </div>
            </form>
        </article>
    </section>
</div>
@endsection
