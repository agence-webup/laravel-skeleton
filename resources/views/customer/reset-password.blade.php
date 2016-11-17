<?php
SEO::setTitle('Réinitialiser le mot de passe');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<div class="container customer-container">
    @include('customer.elements.aside')
    <section class="customer-content">
        <div class="titleModule">
            <h1>Réinitialiser son mot de passe</h1>
            <hr/>
        </div>
        <article>
            <form class="" role="form" action="{{ route('customer.resetPassword') }}" method="post">
                <div class="customer-formContent">
                    {{ csrf_field() }}

                    {!! Form::create('password', 'password')->label('Mot de passe')->attr(['autofocus', 'class' => 'f-100']) !!}
                    {!! Form::create('password', 'password_confirmation')->label('Confirmation du mot de passe')->attr(['class' => 'f-100']) !!}

                    <button class="btn btn-primary" type="submit">Réinitialiser le mot de passe</button>
                </div>
            </form>
        </article>
    </section>
</div>

@endsection
