<form action="{{ route('admin.auth.postLogin') }}" method="POST">
    {{ csrf_field() }}

    {!! Form::create('text', 'email')
    ->label('email')
    ->required() !!}

    {!! Form::create('password', 'password')
    ->label('password')
    ->required() !!}

    <button type="submit">Se connecter</button>
</form>
