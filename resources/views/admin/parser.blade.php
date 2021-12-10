@extends('layouts.app')

@section('title', __('News'))

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>{{ __('Parser') }}</h1>
                        <p>Успешно добавлено {{ $news_count }} новостей.</p>
                        <p>Время выполнения: {{ $exec_time }} сек.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
