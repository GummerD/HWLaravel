@extends('layouts.HW_4.feedback')
@section('title') Страница обратой связи @parent @stop
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Форма обратной связи </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button class="btn btn-sm btn-outline-secondary">Share</button>
        <button class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
    </div>
  </div>

  
  <div class="table-responsive">
    @if($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif 

        <form method ="post" action="{{ route('feedback.store') }}">
            @csrf
            <div class="form-group">
                <label for="username">Имя пользователя</label>
                <input type="text" name="username" id="username" class="form-control"value="{{ old('username') }}">
            </div>
            <div class="form-group">
                <label for="description">Поле для комментария</label>
                <textarea class="form-control" type="text" name="description" id="description" >{{ old('description')}}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
  </div>
@endsection