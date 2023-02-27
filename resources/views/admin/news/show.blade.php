@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.news.create') }}"> Добавить новость</a>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        @forelse ($newsList as $news)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h1>{{ $news->title }}</h1>
                        <h2>{{ $news->categories->map(fn($item) => $item->title)->implode(',') }}</h2>
                        <strong class="d-inline-block mb-2 text-primary">Автор статьи: {{ $news->author }}</strong>
                        <div class="mb-1 text-muted">{{ $news->created_at }}</div>
                        <p class="card-text mb-auto">{!! $news->description !!}  </p>
                        <a href="{{ route('admin.news.index') }}">Вернуться</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" 
                    src="{{ Storage::disk('public')->url($news->image) }}"
                    width="450px", height="350px"
                        alt="Изображение">
                </div>
            </div>
        @empty
            <p>Новостей нет </p>
        @endforelse
    </div>
@endsection


