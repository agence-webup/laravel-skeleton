<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<form class="" action="{{ route('order.store') }}" method="post">
    {{ csrf_field() }}

    {!! Form::create('text', 'email')->label('Adresse e-mail')->value($customer->email)->required()->attr(['autofocus']) !!}

    {!! Form::create('text', 'firstname')->label('Prénom')->value($customer->firstname)->required() !!}

    {!! Form::create('text', 'lastname')->label('Nom')->value($customer->lastname)->required() !!}

    <button type="submit">Valider</button>
</form>
@endsection
