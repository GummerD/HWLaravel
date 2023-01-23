@extends('layouts.HW_main')

@section('content')
    <div style="margin: 10px;">
        <h1>Вы перешли на страницу с категориями новостей.</h1>
    </div>
    <br>
    @forelse($news as $category  => $news)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <h2>Новостная категория:</h2>
                    <br>
                    <h3 class="mb-0">
                        <a href="{{ route('links_on_all_news_title', ['category' => $category]) }}">
                            Перейти на {{ $category }}.

                        </a>
                    </h3>
                </div>
            </div>
        </div>
    @empty
        <p>Категорий не обнаружено.</p>
    @endforelse
@endsection
