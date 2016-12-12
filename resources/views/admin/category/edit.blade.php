@extends('admin.layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Modification d'une catégorie</header>
    <div class="box__content">
        <form class="" action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            @include('admin.category.partial.form')

            <button type="submit">Valider</button>
        </form>
    </div>
</article>
@endsection
