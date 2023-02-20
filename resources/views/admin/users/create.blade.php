@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить пользователя</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>
    <div>

        @if($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif 

        <form method ="post" action="{{ route('admin.users.store') }}">
            @csrf
            <div class="form-group">
                <label for="is_admin">Роль</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option value="1">Администатор</option>
                    <option value="0">Пользователь</option>     
                </select>
            </div>
            <div class="form-group">
                <label for="name">Имя пользователя</label>
                <input type="text" name="name" id="name" class="form-control @error ('name') is-invalid @enderror" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Адрес почты</label>
                <input type="email" name="email" id="email" class="form-control @error ('email') is-invalid @enderror" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" id="password" class="form-control @error ('password') is-invalid @enderror" value="{{ old('password') }}">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
