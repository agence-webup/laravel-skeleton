@extends('helium::layouts.master')

@section('content')

<header class="title-wrapper">
  <h1 class="title">Import de redirections</h1>
  <button class="btn btn--primary" data-submit="importRedirections">Importer les redirections</button>
</header>

<form id="importRedirections" class="" action="{{ route('admin.redirection.postImport') }}" method="post"
  enctype="multipart/form-data">
  {{ csrf_field() }}

  <article class="box">
    <div class="box__content">
      <p>
        Le fichier doit être un csv avec deux colonnes (sans nom de colonne):
      </p>
      <ul>
        <li>Ancienne url</li>
        <li>Nouvelle url</li>
      </ul>
      <input type="file" name="file" id="">
    </div>
  </article>

  <div class="box box--actions">
    <button class="btn btn--primary" data-submit="importRedirections">Importer les redirections</button>
  </div>
</form>
@endsection

@section('js')
@include("helium::admin.redirection.form.javascript")
@endsection
