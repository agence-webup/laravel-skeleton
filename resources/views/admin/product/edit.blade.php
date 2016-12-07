@extends('admin.layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Modification d'un produit</header>
    <div class="box__content">
        <form class="" action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            @include('admin.product.partial.form')

            <button type="submit">Valider</button>
        </form>
    </div>
</article>
@endsection
