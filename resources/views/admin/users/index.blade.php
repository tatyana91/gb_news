@extends('layouts.app')

@section('title', __('Users'))

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1> {{ __('Users') }}</h1>
                        @forelse($users as $item)
                            <p>
                                <div> {{ $item->name }}</div>
                                <form action="{{ route('admin.users.toggleAdmin', $item) }}" method="post">
                                    @csrf
                                    @if ($item->is_admin)
                                        <button type="submit" class="btn btn-danger">Снять админа</button>
                                    @else
                                        <button type="submit" class="btn btn-secondary">Назначить админом</button>
                                    @endif
                                </form>

                            </p>
                        @empty
                            <p>Нет пользователей</p>
                        @endforelse
                        <br>

                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
