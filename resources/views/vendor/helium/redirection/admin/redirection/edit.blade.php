@extends('helium::layouts.master')

@section('content')

<header class="title-wrapper">
  <h1 class="title">Edition `{{ $redirection->id }}`</h1>
  <button class="btn btn--primary" data-submit="editRedirection">Enregistrer la redirection</button>
</header>

<form id="editRedirection" action="{{ route('admin.redirection.update',[$redirection->id]) }}" method="post">

  {{ csrf_field() }}

  <article class="box">
    <header class="box__header">Informations</header>
    <div class="box__content">
      @include('helium::admin.redirection.form.form')
    </div>
  </article>


  <div class="box box--actions">
    <button class="btn btn--primary" data-submit="editRedirection">Enregistrer la redirection</button>
    <button class="btn btn--danger" data-confirm="Voulez vous vraiment supprimer ?"
      data-submit="deleteRedirection">Supprimer la redirection</button>
  </div>

</form>


<form id="deleteRedirection" action="{{ route('admin.redirection.destroy', $redirection->id) }}" method="post">
  {{ method_field('delete') }}
  {{ csrf_field() }}
</form>


@endsection

@section('js')
@include("helium::admin.redirection.form.javascript")
@endsection
