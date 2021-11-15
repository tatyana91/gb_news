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
                            @if ($item->is_private)
                                <p>Для просмотра новости требуется авторизация</p>
                            @else
                                <div class="card-img"
                                     style="background-image: url({{ $item->image ?? asset('storage/images/default.jpeg') }})"></div>
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
