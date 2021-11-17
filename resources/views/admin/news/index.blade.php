@extends('layouts.app')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Новости</h1>
                        <p>
                            <a href="{{ route('admin.news.create') }}">
                                <button type="button" class="btn btn-primary">Добавить новость</button>
                            </a>
                        </p>
                        @forelse($news as $item)
                            <p>
                                <div> {{ $item->title }}</div>
                                <div style="display: flex">
                                    <a class="btn btn btn-secondary" style="margin-right: 10px" href="{{ route('admin.news.edit', $item) }}">Редактировать</a>
                                    <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </div>
                            </p>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                        <br>

                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
