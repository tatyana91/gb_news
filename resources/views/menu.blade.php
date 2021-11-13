<li class="nav-item {{ request()->routeIs('news.all')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.all') }}">Новости</a>
</li>

<li class="nav-item {{ request()->routeIs('news.categories')?'active':'' }}">
    <a class="nav-link" href="{{ route('news.categories') }}">Категории</a>
</li>

<li class="nav-item {{ request()->routeIs('about')?'active':'' }}">
    <a class="nav-link" href="{{ route('about') }}">О нас</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.index') }}">Админка</a>
</li>
