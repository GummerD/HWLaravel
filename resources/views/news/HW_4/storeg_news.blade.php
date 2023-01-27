@extends('layouts.HW_main')

@section('nav')
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach ($news as $keys => $values)
                <a class="p-2 text-muted"
                    href="{{ route('links_on_all_news_title', ['category' => $keys]) }}">{{ $keys }}</a>
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
        @forelse($news as $category  => $news)
            {{-- @dump($news); --}}
            @foreach ($news as $title => $text)
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h3 class="mb-0">
                                <a class="text-dark"
                                    href="{{ route('links_on_all_news_title', ['category' => $category]) }}">{{ $category }}</a>
                            </h3>
                            <div class="mb-1 text-muted">{{ $title }}</div>
                            <p class="card-text mb-auto">{{ $text }}</p>
                            <a
                                href="{{ route('links_on_text_news', [
                                    'category' => $category,
                                    'title' => $title,
                                ]) }}">
                                Продолжить чтение >>>
                            </a>
                        </div>
                        <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb"
                            alt="Card image cap">
                    </div>
                </div>
            @endforeach
        @empty
            <p>Новостей нет.</p>
        @endforelse
    </div>
@endsection
