<?php
SEO::setTitle('Home');
SEO::setDescription('Home page description');
?>

@extends('layouts.master')
@section('content')

<div class="">
    Merci de votre commande
</div>


<div class="">
    <a href="{{ route('customer.dashboard') }}">J'accède à mon compte</a>
</div>
<a href="{{ route('home') }}">Retourner sur le site</a>
@endsection
