{!! Form::create('text', 'title')->label('Titre')->value($product->title) !!}

{!! Form::create('text', 'reference')->label('Référence')->value($product->reference) !!}

{!! Form::create('text', 'price')->label('Prix')->value($product->price) !!}
