@extends('layouts.HW_main')
@php
    $url = $_SERVER['REQUEST_URI'];
    $arr = explode('/', $url);
@endphp

@section('content')
    <div style=" margin: 10px;">
        <h1>Cтраница новостной категории: {{$arr[3]}}.</h1>
    </div>
    <br>
    @forelse($category as $title => $text)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <h2>Название новости:</h2>
                    <br>
                    <h2>{{ $title }}</h2>
                    <br>
                    <h3 class="mb-0">
                        <a
                            href="{{ route('links_on_text_news', [
                                'category' => $arr[3],
                                'title' => $title,
                            ]) }}">
                            Читать новость >>> 
                        </a>
                    </h3>
                </div>
            </div>
        </div>
    @empty
        <p>Новости не обнаружены.</p>
    @endforelse
@endsection
