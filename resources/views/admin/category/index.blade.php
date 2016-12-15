@extends('admin.layouts.master')

@section('content')
<article class="box">
    <header class="box__header">Liste des catégories</header>
    <div class="box__actions">
        <a href="{{ route('admin.category.create') }}" class="btn btn--primary">Ajouter une catégorie</a>
        {{-- <a href="#" id="toggle-order" class="btn btn--secondary">Modifier l'ordre</a> --}}
    </div>
    <div class="box__content" id="items" class="toto">
        @foreach($categories as $category)
            @include('admin.category.partial.category-element',['category' => $category, 'level' => 1])
        @endforeach
    </div>
</article>
@endsection


{{--
<style>
    .menuItem__icon__draggable{
        transition: nomAnim 3s ease-out;
        display: block;

    }

    .hidden {
      display: none;
      opacity: 0;
    }

    @keyframes nomAnim {
        0%   { width: 50px;}
        50%  { width: 200px;}
        100% { width: 100px;}
    }
}
</style>
 @section('js')
    <script src="{{ asset('/node_modules/sortablejs/Sortable.min.js') }}"></script>
    <script>
        var draggableIcons = document.getElementsByClassName("menuItem__icon__draggable");
        var toggleOrderButton = document.getElementById("toggle-order");
        var testClass = "fa fa-arrows menuItem__icon isDraggable menuItem__icon__draggable";
        var el = document.getElementById('items');
        var isSorting = false;
        var sortable = Sortable.create(el,{
            dataIdAttr: 'data-id',
            onSort: function (evt) {
                console.log('dfssdsd');
                console.log(sortable.toArray());
            },
        });

        toggleDraggable(isSorting);
        toggleOrderButton.onclick = function () {
            isSorting = !isSorting;
            toggleDraggable(isSorting);
        };

        function toggleDraggable(state){
            sortable.option("disabled", !isSorting);
            for (var i = 0; i < draggableIcons.length; i++) {
                if(state){
                    toggleOrderButton.innerHTML = "Arrêter la modification";
                    toggleOrderButton.className = "btn btn--danger";
                    draggableIcons[i].className = testClass;
                }else{
                    toggleOrderButton.innerHTML = "Modifier l'ordre";
                    toggleOrderButton.className = "btn btn--secondary";
                    draggableIcons[i].className = testClass+" hidden";
                }
            }
        }
    </script>
@endsection --}}
