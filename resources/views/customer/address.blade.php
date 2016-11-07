<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Mon adresse</h1>

<form class="" action="{{ route('customer.address.update') }}" method="post">
    {{ csrf_field() }}

    {!! Form::create('text', 'address')->label('Adresse') !!}
    {!! Form::create('text', 'zipcode')->label('Code postal') !!}
    {!! Form::create('text', 'city')->label('Ville') !!}

    <button type="submit">Enregistrer</button>
</form>

@endsection
