@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Список пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('admin.users.create') }}"> Добавить пользователя</a>
            </div>
        </div>
    </div>
    <div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Роль</th>
                        <th>Имя пользовталея</th>
                        <th>Адрес почты</th>
                        <th>Дата добавления</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usersList as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>@if ($user->is_admin === (bool)1) Администратор @else Пользователь @endif</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Изм.</a>&nbsp;
                                <a href="javascript:;" class="delete" rel="{{ $user->id }}" style="color:red;">Уд.</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Записей нет</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $usersList->links() }}
        </div>
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
                        send(`/admin/users/${id}`).then(() => {
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
