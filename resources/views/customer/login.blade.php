<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')

@if(session()->has('loginMessage'))
    <p>{{ session()->get('loginMessage') }}</p>
@endif

<form class="" action="{{ route('customer.postLogin') }}" method="post">
    {{ csrf_field() }}

    {!! Form::create('text', 'email')->label('Adresse e-mail')->attr(['required', 'autofocus']) !!}
    {!! Form::create('password', 'password')->label('Mot de passe')->attr(['required']) !!}

    <button type="submit">Connexion</button>

    <a href="{{ route('customer.forgotPassword') }}">J'ai oublié mon mot de passe</a>
</form>
@endsection
