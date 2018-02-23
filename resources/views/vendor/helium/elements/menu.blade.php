<nav class="navigation">
    <a href="{{ route('admin.customer.index') }}" class="{{ current_class('admin.customer','isActive') }}"><i class="fa fa-users icon"></i> Clients</a>
    <a href="{{ route('admin.product.index') }}" class="{{ current_class('admin.product','isActive') }}"><i class="fa fa-dropbox icon"></i> Produits</a>
    <a href="{{ route('admin.category.index') }}" class="{{ current_class('admin.category','isActive') }}"><i class="fa fa-list icon"></i> Catégories</a>
    <a href="{{ route('admin.contact.index') }}" class="{{ current_class('admin.contact', 'is-active') }}"><i class="fa fa-envelope icon"></i> Contact</a>
    <a href="{{ route('admin.setting.edit') }}" class="{{ current_class('admin.setting', 'is-active') }}"><i class="fa fa-cog icon"></i> Paramètres</a>
</nav>
