@extends('layouts.HW_6main')

@section('nav')
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach ($categories as $category)
                <a class="p-2 text-muted" href="#">{{ $category->title }}</a>
            @endforeach
        </nav>
    </div>
@endsection


@section('content')
    <div style="margin: 10px; ">
        <h1 style="text-align: center">Главная страница новостного сайта.</h1>
    </div>
    <br>
    <div class="row mb-2">
        @forelse($newslist as $news)
            {{-- @dump($news); --}}
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">{{ $news->categories->map(fn($item) => $item->title)->implode(",") }}</a>
                        </h3>
                        <div class="mb-1 text-muted">{{ $news->title }}</div>
                        <p class="card-text mb-auto">{{ $news->description }}</p>
                        <a
                            href="{{ route('hw_6.links_on_text_news', [
                                'news' => $news,
                            ]) }}">
                            Продолжить чтение >>>
                        </a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb"
                        alt="Card image cap">
                </div>
            </div>

        @empty
            <p>Новостей нет.</p>
        @endforelse
    </div>
@endsection
