@extends('layouts.HW_6.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать заказ</h1>
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

        <form method ="post" action="{{ route('hw_6.orderForm.update', ['orderForm' => $orderForm]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="name">Имя заказчика</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $orderForm->name }}">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="text" class="form-control" name="phone" id="hone" value="{{ $orderForm->phone }}">
            </div>
            <div class="form-group">
                <label for="email">Адрес эл. почты</label>
                <input class="form-control" type="text" name="email" id="email" value="{{ $orderForm->email }}">
            </div>
            <div class="form-group">
                <label for="description">Поле для ввода информации заказа</label>
                <textarea class="form-control" type="text" name="description" id="description">{{ $orderForm->description }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
