@extends('admin.layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Liste des produits</header>
    <div class="box__actions">
        <a href="{{ route('admin.product.create') }}" class="btn btn--primary">Ajouter un produit</a>
    </div>
    <div class="box__content">
        <table class="txtcenter">
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->reference }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td><a href="{{ route('admin.product.edit', ['id' => $product->id]) }}">modifier</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</article>
@endsection
