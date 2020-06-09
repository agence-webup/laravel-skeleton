<span class="dropmic" data-dropmic="{{ $redirection->id }}" data-dropmic-direction="bottom-left" role="navigation">
    <span data-dropmic-btn onclick="event.preventDefault();event.stopPropagation()"><i data-feather="more-horizontal"></i></span>
    <div class="dropmic-menu" aria-hidden="true">
        <ul class="dropmic-menu__list" role="menu">
        
        <li class="dropmic-menu__listItem" role="menuitem">
    <a class="dropmic-menu__listContent" href="{{ route('admin.redirection.edit', ['id' => $redirection->id]) }}" tabindex="-1">Editer</a>
</li>

        <li class="dropmic-menu__listItem" role="menuitem">
    <form action="{{ route('admin.redirection.destroy', $redirection->id) }}" method="post" class="inline">
        {{ method_field('delete') }}
        {{ csrf_field() }}
        <button class="dropmic-menu__listContent" data-confirm="Êtes vous certain de vouloir supprimer ?">Supprimer</button>
    </form>
</li>
        
        </ul>
    </div>
</span>
