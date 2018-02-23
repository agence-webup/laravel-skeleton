@extends('helium::layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Messages reçus</header>
    <div class="box__content">
        <p>
            Nom : {{ $message->name }} <br>
            Email : {{ $message->email }}
        </p>
        <p>
            {!! nl2br(e($message->message)) !!}
        </p>
    </div>
</article>
@endsection
