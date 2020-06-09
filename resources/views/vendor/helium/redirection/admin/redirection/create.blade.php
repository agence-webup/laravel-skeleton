@extends('helium::layouts.master')

@section('content')

<header class="title-wrapper">
  <h1 class="title">Création d'une redirection</h1>
  <button class="btn btn--primary" data-submit="createRedirection">Créer la redirection</button>
</header>

<form id="createRedirection" class="" action="{{ route('admin.redirection.store') }}" method="post">
  {{ csrf_field() }}

  <article class="box">
    <header class="box__header">Informations</header>
    <div class="box__content">
      @include('helium::admin.redirection.form.form')
    </div>
  </article>

  <div class="box box--actions">
    <button class="btn btn--primary" data-submit="createRedirection">Créer la redirection</button>
  </div>
</form>
@endsection

@section('js')
@include("helium::admin.redirection.form.javascript")
@endsection
