@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить новость</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>
    <div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Заголовок</th>
                        <th>Автор</th>
                        <th>Статус</th>
                        <th>Опсиание</th>
                        <th>Дата добавления</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($newslist as $news)
                        <tr>
                            <td>{{ $news->id }}</td>
                            <td>{{ $news->title }}</td>
                            <td>{{ $news->author }}</td>
                            <td>{{ $news->status }}</td>
                            <td>{{ $news->description }}</td>
                            <td>{{ $news->created_at }}</td>
                            <td><a href="#">Изм.</a>&nbsp;<a href="#" style="color:red;">Уд.</a></td>
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