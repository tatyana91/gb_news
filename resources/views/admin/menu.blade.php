<li class="nav-item {{ request()->routeIs('admin.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.index') }}">Админка</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.news.index') }}">Новости</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.categories.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.categories.index') }}">Категории</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.users.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.users.index') }}"> {{ __('Users') }}</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.parser.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.parser.index') }}"> {{ __('Parser') }}</a>
</li>
