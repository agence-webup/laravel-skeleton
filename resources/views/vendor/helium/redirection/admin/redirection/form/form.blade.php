{!! Form::create('text', 'from')
    ->label('Url à rediriger')
    ->value($redirection->from)
    ->required()
!!}
{!! Form::create('text', 'to')
    ->label('Nouvelle rediriger')
    ->value($redirection->to)
    ->required()
!!}
