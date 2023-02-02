@extends('layouts.HW_6.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить ресурс</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>
    <div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('hw_6.sources.store') }}">
            @csrf
                <div class="form-group">
                    <label for="source_name">Название ресурса</label>
                    <input type="text" class="form-control" name="source_name" id="source_name" placeholder="Название ресурса"
                        value="{{ old('source_name') }}">
                </div>
                <div class="form-group">
                    <label for="source_url">Адрес ресурса</label>
                    <input type="text" class="form-control" name="source_url" id="source_url"
                        placeholder="Введите адрес ресурса" value="{{ old('source_url') }}">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
