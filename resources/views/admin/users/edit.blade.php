@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать пользователей</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                
            </div>
        </div>
    </div>
    <div>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif 

        <form method ="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="is_admin">Роль</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option value="1">Администратор</option>
                    <option value="0">Пользователь</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="v" class="form-control"value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Эл. почта</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
