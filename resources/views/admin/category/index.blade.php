@extends('admin.layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Liste des catégories</header>
    <div class="box__actions">
        <a href="{{ route('admin.category.create') }}" class="btn btn--primary">Ajouter une catégorie</a>
        <a class="btn btn--secondary">Modifier l'ordre</a>
    </div>
    <div class="box__content">
        @foreach($categories as $category)
            @include('admin.category.partial.category-element',['category' => $category, 'level' => 1])
        @endforeach
    </div>
</article>
@endsection



@section('js')
@endsection
