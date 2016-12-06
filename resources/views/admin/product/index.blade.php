@extends('admin.layouts.master')

@section('content')

<article class="box">
    <header class="box__header">Liste des produits</header>
    <div class="box__content">
        <table class="txtcenter">
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->reference }}</td>
                        <td>{{ $product->name }}</td>
                        <td><span class="tag tag--green">green</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</article>


@endsection
