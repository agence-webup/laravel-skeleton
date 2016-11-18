<?php
SEO::setTitle('Modifier l\'email');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<div class="container customer-container">
    @include('customer.elements.aside')
    <section class="customer-content">
        <div class="titleModule">
            <h1>Modifier l'email</h1>
            <hr/>
        </div>
        <article>
            <form class="" role="form" action="{{ route('customer.email.update') }}" method="post">
                {{ csrf_field() }}

                <div class="customer-formContent">

                    {!! Form::create('email', 'email')->label('Email')->attr(['autofocus', 'class' => 'f-100']) !!}

                    <button class="btn btn-primary" type="submit">Modifier l'email</button>
                </div>
            </form>
        </article>
    </section>
</div>

@endsection
