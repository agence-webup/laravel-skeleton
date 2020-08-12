@extends('helium::layouts.auth')

@section('content')
<div class="login-box">
    <form action="{{ route('admin.postLogin') }}" method="post">
        {{ csrf_field() }}

        {!! Form::create('text', 'email')
            ->label('Adresse e-mail') !!}

        {!! Form::create('password', 'password')
            ->label('Mot de passe') !!}

        <div class="mt3">
            <button type="submit" class="btn btn--primary login-box__btn">Se connecter</button>
        </div>
    </form>
</div>
@endsection
