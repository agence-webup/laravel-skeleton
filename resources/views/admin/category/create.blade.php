@extends('admin.layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Ajout d'une catégorie</header>
    <div class="box__content">
        <form class="" action="{{ route('admin.category.store') }}" method="post">
            {{ csrf_field() }}

            @include('admin.category.partial.form')

            <button type="submit">Valider</button>
        </form>
    </div>
</article>
@endsection
