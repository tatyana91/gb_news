@extends('layouts.app')

@section('title', __('Categories'))

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1> {{ __('Categories') }}</h1>
                        <p>
                            <a href="{{ route('admin.categories.create') }}">
                                <button type="button" class="btn btn-primary">Добавить категорию</button>
                            </a>
                        </p>
                        @forelse($categories as $item)
                            <p>
                                <div> {{ $item->title }}</div>
                                <div style="display: flex">
                                    <a class="btn btn btn-secondary" style="margin-right: 10px" href="{{ route('admin.categories.edit', $item) }}">Редактировать</a>
                                    <form action="{{ route('admin.categories.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </div>
                            </p>
                        @empty
                            <p>Нет категорий</p>
                        @endforelse
                        <br>

                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
