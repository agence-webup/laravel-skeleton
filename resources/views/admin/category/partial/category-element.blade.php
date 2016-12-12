
<div class="menuItem" data-level="{{ $level }}">
    <i class="fa fa-arrows menuItem__icon isDraggable"></i>
    <div class="menuItem__label">{{ $category->title }}</div>


    <span class="dropmic" data-dropmic="{{ $category->id }}" data-dropmic-direction="bottom-left">
        <i class="fa fa-cog menuItem__icon"></i>
        <div class="dropmic-menu">
            <ul class="dropmic-menu__list">
                <li class="dropmic-menu__listItem">
                    <a href="">Modifier</a>
                </li>
                <li class="dropmic-menu__listItem">
                     <form action="{{ route('admin.category.destroy', $category->id) }}" method="post" class="inline">
                         {{ method_field('delete') }}
                         {{ csrf_field() }}
                         <button class="dropmic-menu__listContent"><i class="fa fa-trash"></i> Supprimer</button>
                     </form>
                 </li>
            </ul>
        </div>
    </span>


</div>



@foreach ($category->subCategories as $key => $subCategory)
    @include('admin.category.partial.category-element', [
                                                            'category' => $subCategory,
                                                            'level' => $level+1
                                                        ])
@endforeach
