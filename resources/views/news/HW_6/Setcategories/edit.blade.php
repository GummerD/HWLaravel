@extends('layouts.HW_6.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать категорию</h1>
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

        <form method ="post" action="{{ route('hw_6.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Заголовок категории</label>
                <input type="text" name="title" id="title" class="form-control"value="{{ $category->title }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" type="text" name="description" id="description" >{{ $category->description }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
