@extends('helium::layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Ajout d'un produit</header>
    <div class="box__content">
        <form class="" action="{{ route('admin.product.store') }}" method="post">
            {{ csrf_field() }}

            @include('admin.product.partial.form')

            <button type="submit">Valider</button>
        </form>
    </div>
</article>
@endsection
