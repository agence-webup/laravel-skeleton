@extends('admin.layouts.master')

@section('content')

<article class="box">
    <header class="box__header">Liste des clients</header>
    <div class="box__content">
        <table class="txtcenter">
            <tbody><tr>
                <td>row 1 col 1</td>
                <td>row 1 col 2</td>
                <td><span class="tag tag--green">green</span></td>
            </tr>
            <tr>
                <td>row 2 col 1</td>
                <td>row 2 col 2</td>
                <td><span class="tag tag--red">red</span></td>
            </tr>
            <tr>
                <td>row 3 col 1</td>
                <td>row 3 col 2</td>
                <td><span class="tag tag--blue">blue</span></td>
            </tr>
            <tr>
                <td>row 4 col 1</td>
                <td>row 4 col 2</td>
                <td><span class="tag tag--orange">orange</span></td>
            </tr>
            <tr>
                <td>row 5 col 1</td>
                <td>row 5 col 2</td>
                <td><span class="tag tag--yellow">yellow</span></td>
            </tr>
            <tr>
                <td>row 5 col 1</td>
                <td>row 5 col 2</td>
                <td><span class="tag tag--grey">grey</span></td>
            </tr>
        </tbody></table>
    </div>
</article>


@endsection
