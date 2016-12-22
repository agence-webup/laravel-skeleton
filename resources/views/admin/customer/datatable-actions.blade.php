<span class="dropmic" data-dropmic="{{ $customer->id }}" data-dropmic-direction="bottom-left">
    <button class="btn btn--action pullLeft" data-dropmic-btn><i class="fa fa-cog"></i> actions</button>
    <div class="dropmic-menu">
        <ul class="dropmic-menu__list">
            <li class="dropmic-menu__listItem">
                <form action="{{ route('admin.customer.edit', ['id' => $customer->id]) }}" method="post" class="inline">
                    {{ csrf_field() }}
                    <button type="submit" class="dropmic-menu__listContent"><i class="fa fa-edit"></i> Editer</button>
                </form>
            </li>
        </ul>
    </div>
</span>
