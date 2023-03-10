@extends('layouts.HW_6.main')
@section('title') Страница редактирования категорий @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Выбрать категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('hw_6.categories.create') }}"> <h5>Добавить категорию</h5></a>
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
                        <th>Название категории</th>
                        <th>Описание</th>
                        <th>Дата добавления</th>
                        <th>Дата обновления</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @forelse ($categoryList as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td><a href="{{ route('hw_6.categories.edit', ['category' => $category]) }}">Изм.</a>&nbsp;
                                <a href="javascript:;" class="delete" rel="{{ $category->id }}" style="color:red;">Уд.</a></td>
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

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                    let id = e.getAttribute('rel');
                    if (confirm(`Подтвердиете удаление записи с #ID =${id}`)) {
                        send(`/HW_6/categories/${id}`).then(() => {
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
