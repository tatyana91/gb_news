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
                        <h1>Новости</h1>
                        @forelse($news as $item)
                            <a href="{{ route('news.one', $item->slug) }}"> {{ $item->title }}
                                <div class="card-img"
                                     style="background-image: url({{ $item->image ?? asset('storage/images/default.jpeg') }})"></div></a><br>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse

                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
