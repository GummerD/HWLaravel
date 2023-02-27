@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.sources.create') }}"> Добавить ичточник</a>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        @forelse ($sourcesList as $source)
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <h1>{{ $source->name }}</h1>
                        <h2>{{ $source->link }}</h2>
                </div>
            </div>
        @empty
            <p>Новостей нет </p>
        @endforelse
    </div>
@endsection


