<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Mot de passe oublié</h1>
<form class="" action="{{ route('customer.postForgotPassword') }}" method="post">
    {{ csrf_field() }}

    @if (session('status'))
        {{ session('status') }}
    @endif

    {!! Form::create('text', 'email')->label('Adresse e-mail')->attr(['required', 'autofocus']) !!}

    <button type="submit">M'envoyer un e-mail</button>
</form>
@endsection
