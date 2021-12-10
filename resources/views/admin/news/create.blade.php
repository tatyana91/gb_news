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
                        <h1>@if ($news->id) Редактирование @else Добавление @endif новости</h1>
                        <form method="POST" action="@if (!$news->id) {{ route('admin.news.store') }} @else {{ route('admin.news.update', $news) }} @endif" enctype="multipart/form-data">
                            @csrf
                            @if ($news->id) @method('PUT') @endif

                            <div class="form-group row">
                                <label for="title" class="col-md-12 col-form-label">Название</label>
                                <div class="col-md-12">
                                    <input id="title" type="text"
                                           class="form-control @error('title') is-invalid @enderror" name="title"
                                           value="{{ old('title') ?? $news->title }}"
                                           autocomplete="title" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-12 col-form-label">Категория</label>

                                <div class="col-md-12">
                                    <select id="category_id" name="category_id" class="form-control">
                                       @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}" @if ($category->id == old('category_id') || $category->id == $news->category_id) selected @endif>{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-12 col-form-label">Текст новости</label>

                                <div class="col-md-12">
                                    <textarea id="text" name="text"
                                              class="form-control @error('text') is-invalid @enderror"
                                    >{{ old('text')   ?? $news->text}}</textarea>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="is_private" type="checkbox" name="is_private"
                                           @if ($news->is_private == 1 || old('is_private')) checked @endif
                                           value="1">
                                    <label for="is_private" class="col-form-label">приватная</label>
                                    @error('is_private')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        @if ($news->id) {{ __('Изменить') }} @else {{ __('Добавить') }} @endif
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
