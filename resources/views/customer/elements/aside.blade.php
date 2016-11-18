<aside class="customer-aside">
    <header class="titleModule">
        <h1>Mon compte</h1>
        <hr/>
    </header>
    <nav class="customer-nav">
        <ul class="customer-nav__list">
            <li class="customer-nav__listItem">
                <a class="customer-nav__link {{current_class('customer.dashboard', 'customer-nav__link--active')}}" href="{{ route('customer.dashboard') }}">Tableau de bord</a>
            </li>
            <li class="customer-nav__listItem">
                <a class="customer-nav__link {{current_class('customer.resetPassword', 'customer-nav__link--active')}}" href="{{ route('customer.resetPassword') }}">Modifier mon mot de passe</a>
            </li>
            <li class="customer-nav__listItem">
                <a class="customer-nav__link {{current_class('customer.email.edit', 'customer-nav__link--active')}}" href="{{ route('customer.email.edit') }}">Modifier mon email</a>
            </li>
            <li class="customer-nav__listItem">
                <a class="customer-nav__link {{current_class('customer.address.edit', 'customer-nav__link--active')}}" href="{{ route('customer.address.edit') }}">Information de livraison</a>
            </li>
            <li class="customer-nav__listItem">
                <a class="customer-nav__link {{current_class('customer.order.index', 'customer-nav__link--active')}}" href="{{ route('customer.order.index') }}">Mes commandes</a>
            </li>
        </ul>
    </nav>
</aside>
