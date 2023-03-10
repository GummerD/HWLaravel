@extends('layouts.HW_6.main')
@section('title') Страница новостей @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('hw_6.news.create') }}"> Добавить новость</a>
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
                        <th>Категория</th>
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
                            <td>{{ $news->categories->map(fn($item)  => $item->title)->implode(",") }}</td> 
                            <td>{{ $news->title }}</td>
                            <td>{{ $news->author }}</td>
                            <td>{{ $news->status }}</td>
                            <td>{{ $news->description }}</td>
                            <td>{{ $news->created_at }}</td>
                            <td><a href="{{ route('hw_6.news.edit', ['news' => $news]) }}">Изм.
                                </a>&nbsp;<a href="javascript:;" class="delete" rel="{{ $news->id }}" style="color:red;">Уд.</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Записей нет</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $newslist->links() }}
        </div>
@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                    let id = e.getAttribute('rel');
                    if (confirm(`Подтвердиете удаление записи с #ID =${id}`)) {
                        send(`/HW_6/news/${id}`).then(() => {
                            location.reload(); 
                        });
                    } else {
                        alert("Удаление отменено");
                    }
                });
            });
        });
        async function send(url) {
            let response = await fetch(url, {
                method: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
