@extends('admin.layouts.auth')

@section('content')
<div class="login-box">
    <form action="{{ route('admin.auth.postLogin') }}" method="POST">
        {{ csrf_field() }}

        {!! Form::create('text', 'email')
        ->label('Nom d\'utilisateur')
        ->required() !!}

        {!! Form::create('password', 'password')
        ->label('Mot de passe')
        ->required() !!}

        <button type="submit">Se connecter</button>
    </form>
</div>
@endsection
