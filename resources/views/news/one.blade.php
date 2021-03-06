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
                        @if ($item)
                            <h1>{{ $item->title }}</h1>
                            @if ($item->is_private && !Auth::user())
                                <p>Для просмотра новости требуется авторизация</p>
                            @else
                                <img class="card-img" alt="{{ $item->title }}"
                                     src="{{ $item->image ?? asset('storage/images/default.jpeg') }}">
                                <p>{{ $item->text }}</p>
                            @endif
                        @else
                            <p>Новость не найдена</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
