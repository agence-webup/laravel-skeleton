<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')
<h1>Mon compte</h1>

<div class="">
    <h2>Mon adresse</h2>

    Jacques Coquillon<br>
    10 rue des soufflets<br>
    42900 Crossroad

    <div class="">
        <a href="{{ route('customer.address.edit') }}">Modifier</a>
    </div>
</div>

<div class="">
    <a href="{{ route('customer.resetPassword') }}">Changer mon de passe</a>

</div>
@endsection
