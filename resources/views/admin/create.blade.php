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
                        <h1>Добавление новости</h1>
                        <form method="POST" action="{{ route('admin.create') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-12 col-form-label">Название</label>

                                <div class="col-md-12">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-12 col-form-label">Категория</label>

                                <div class="col-md-12">
                                    <select id="category_id" name="category_id" class="form-control">
                                       @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}" {{ $category['id'] == old('category_id') ? 'selected' : ''  }}>{{ $category['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="text" class="col-md-12 col-form-label">Текст новости</label>

                                <div class="col-md-12">
                                    <textarea id="text" name="text" class="form-control">{{ old('text') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="is_private" type="checkbox" name="is_private"
                                        {{ old('is_private') ? 'checked' : ''}}>
                                    <label for="is_private" class="col-form-label">приватная</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        Добавить
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
