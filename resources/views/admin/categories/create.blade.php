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
                        <h1>@if ($category->id) Редактирование @else Добавление @endif категории</h1>
                        <form method="POST" action="@if (!$category->id) {{ route('admin.categories.store') }} @else {{ route('admin.categories.update', $category) }} @endif" enctype="multipart/form-data">
                            @csrf
                            @if ($category->id) @method('PUT') @endif

                            <div class="form-group row">
                                <label for="title" class="col-md-12 col-form-label">Название категории</label>
                                <div class="col-md-12">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror"
                                           name="title"
                                           value="{{ old('title') ?? $category->title }}"
                                           autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        @if ($category->id) {{ __('Изменить') }} @else {{ __('Добавить') }} @endif
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
