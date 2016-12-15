@extends('admin.layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Liste des catégories</header>
    <div class="box__actions">
        <a href="{{ route('admin.category.create') }}" class="btn btn--primary">Ajouter une catégorie</a>
        <a class="btn btn--secondary">Modifier l'ordre</a>
    </div>
    <div class="box__content" id="items" class="toto">
        @foreach($categories as $category)
            @include('admin.category.partial.category-element',['category' => $category, 'level' => 1])
        @endforeach
    </div>
</article>
@endsection



@section('js')
    <script src="{{ asset('/node_modules/sortablejs/Sortable.min.js') }}"></script>
    <script>

        var slides = document.getElementsByClassName("test");
        for(var i = 0; i < slides.length; i++)
        {
           Sortable.create(slides.item(i),{
               delay: 0, // time in milliseconds to define when the sorting should start
               animation: 150,  // ms, animation speed moving items when sorting, `0` — without animation
               handle: ".menuItem__icon",  // Drag handle selector within list items
               ghostClass: "sortable-ghost",  // Class name for the drop placeholder
               chosenClass: "sortable",  // Class name for the chosen item
               dragClass: "sortable-drag"  // Class name for the dragging item
           });
        }
    </script>
@endsection
