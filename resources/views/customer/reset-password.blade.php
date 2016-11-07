<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Reset Password</h1>

<form class="" role="form" action="{{ route('customer.resetPassword') }}" method="post">
    {{ csrf_field() }}

    {!! Form::create('password', 'password')->label('Mot de passe')->attr(['autofocus']) !!}
    {!! Form::create('password', 'password_confirmation')->label('Confirmation du mot de passe') !!}

    <button type="submit">Valider</button>
</form>

@endsection
