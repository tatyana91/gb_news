<li class="nav-item {{ request()->routeIs('admin.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.index') }}">Админка</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.news.index') }}">Новости</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.categories.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.categories.index') }}">Категории</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.test1')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.test1') }}">download json</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.test2')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.test2') }}">download image</a>
</li>
