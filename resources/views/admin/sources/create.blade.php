@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить источник</h1>
    </div>
    <div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.sources.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Название источника</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="link">Адрес источника</label>
                <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror"
                    value="{{ old('link') }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection


