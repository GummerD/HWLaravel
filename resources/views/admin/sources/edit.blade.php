@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать источник</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">

            </div>
        </div>
    </div>
    <div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.sources.update', ['source' => $source]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Название источника</label>
                <input type="text" name="name" id="name" class="form-control" value="{!! $source->name !!}">
            </div>
            <div class="form-group">
                <label for="link">Адрес источника</label>
                <input type="text" name="link" id="link" class="form-control" value="{{ $source->link }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection