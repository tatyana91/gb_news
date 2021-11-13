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
                        <h1>Категории</h1>
                        @forelse($categories as $item)
                            <a href="{{ route('news.category', $item['slug']) }}">{{ $item['title'] }}</a><br>
                        @empty
                            <p>Категорий новостей пока что нет</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
