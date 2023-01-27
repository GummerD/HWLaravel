@extends('layouts.HW_4.feedback')
@section('title') Страница заказа @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Форма заказа</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('order_form.store') }}">
            @csrf
            <div class="form-group">
                <label for="username">Имя заказчика</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Введите ваше имя" value="{{ old('username') }}">
            </div>
            <div class="form-group">
                <label for="numberphone">Номер телефона</label>
                <input  type="text" class="form-control" name="numberphone" id="numberphone" placeholder="Введите номер телефона" value="{{ old('numberphone') }}">
            </div>
            <div class="form-group">
                <label for="email">Адрес эл. почты</label>
                <input class="form-control" type="text" name="email" id="email" placeholder="Введите адрес эл. почты"  value="{{ old('username') }}">
            </div>
            <div class="form-group">
                <label for="description">Поле для ввода информации заказа</label>
                <textarea class="form-control" type="text" name="description" id="description" placeholder="Опишите заказ">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Отправить</button>
        </form>
    </div>
@endsection
