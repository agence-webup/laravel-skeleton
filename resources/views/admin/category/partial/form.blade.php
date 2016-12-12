{!! Form::create('select','category_id')->label('Catégorie parent')->addOptions($categoriesForSelect)->value($category->category_id) !!}

{!! Form::create('text', 'title')->label('Nom de la catégorie')->value($category->title) !!}

{!! Form::create('text', 'description')->label('Description de la catégorie')->value($category->description) !!}

{!! Form::create('text', 'metaTitle')->label('Titre référencement')->value($category->metaTitle) !!}

{!! Form::create('text', 'metaDescription')->label('Description référencement')->value($category->metaDescription) !!}

{!! Form::create('text', 'metaKeywords')->label('Mots clés')->value($category->metaKeywords) !!}

{!! Form::create('checkbox', 'published')->label('Mettre en ligne')->value($category->published) !!}
