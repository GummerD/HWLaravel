@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Парсер новостей</h1>
    </div>
    <x-alert type="success" message="Парсинг выполнен успешно"></x-alert>
    <button class="btn btn-success">
        <a href="{{ route('admin.index') }}" style="text-decoration: none; color: #EEEEEE">Готово</a>
    </button>
@endsection