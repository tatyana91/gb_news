@extends('layouts.app')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($category)
                            <h1>Категория {{ $category->title }}</h1>
                            @forelse($news as $item)
                                <a href="{{ route('news.one', $item->slug) }}">{{ $item->title }}</a><br>
                            @empty
                                <p>Новостей данной категории ещё нет</p>
                            @endforelse

                            {{ $news->links() }}
                        @else
                            <p>Категория не найдена</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
