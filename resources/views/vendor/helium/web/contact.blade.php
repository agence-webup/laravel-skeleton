<?php
SEO::setTitle('Contactez-nous');
SEO::setDescription('Nous contacter');
?>
@extends('layouts.master')

@section('content')
{{-- @include('elements.flash') --}}
<form action="{{ route('contact.store') }}" method="post">
    {{ csrf_field() }}

    {!! Form::create('text', 'name')
        ->label('Nom') !!}

    {!! Form::create('text', 'email')
        ->label('Adresse e-mail') !!}

    {!! Form::create('textarea', 'message')
        ->label('Message') !!}

    <button type="submit">Envoyé</button>
</form>
@endsection
