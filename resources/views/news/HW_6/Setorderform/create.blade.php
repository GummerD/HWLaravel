@extends('layouts.HW_6.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить заказ</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>
    <div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('hw_6.orderForm.store') }}">
            @csrf
                <div class="form-group">
                    <label for="name">Имя заказчика</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"
                        value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="phone">Номер телефона</label>
                    <input type="text" class="form-control" name="phone" id="hone"
                        placeholder="Введите номер телефона" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="email">Адрес эл. почты</label>
                    <input class="form-control" type="text" name="email" id="email"
                        placeholder="Введите адрес эл. почты" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="description">Поле для ввода информации заказа</label>
                    <textarea class="form-control" type="text" name="description" id="description" 
                        placeholder="Опишите заказ">{{ old('description') }}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
