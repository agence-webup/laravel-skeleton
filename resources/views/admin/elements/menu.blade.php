<ul>
    <li class="{{ current_class('admin.customer','isActive') }}"><a href="{{ route('admin.customer.index') }}">Clients</a></li>
    <li class="{{ current_class('admin.product','isActive') }}"><a href="{{ route('admin.product.index') }}">Produits</a></li>
    <li class="{{ current_class('admin.category','isActive') }}"><a href="{{ route('admin.category.index') }}">Catégories</a></li>
</ul>
