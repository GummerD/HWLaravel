@extends('layouts.HW_6.main')
@section('title') Страница новостных источников @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Источники</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('hw_6.sources.create') }}"> Добавить источник</a>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Название источника</th>
                        <th>Адрес источника</th>
                        <th>Дата добавления</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sources as $source)
                        <tr>
                            <td>{{ $source->id }}</td>
                            <td>{{ $source->source_name }}</td>
                            <td>{{ $source->source_url }}</td>
                            <td>{{ $source->created_at }}</td>
                            <td><a href="{{ route('hw_6.sources.edit', ['source' => $source]) }}">Изм.</a>&nbsp;<a href="#" style="color:red;">Уд.</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Записей нет</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
@endsection
