@extends('layouts.HW_6.main')
@section('title') Страница заказов @parent @stop
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Заказы</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="{{ route('hw_6.orderForm.create') }}"> Добавить заказ</a>
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
                        <th>Имя заказчика</th>
                        <th>Номер телефона</th>
                        <th>Адрес эл. почты</th>
                        <th>Информация о заказе</th>
                        <th>Дата добавления</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orderForms as $orderForm)
                        <tr>
                            <td>{{ $orderForm->id }}</td>
                            <td>{{ $orderForm->name }}</td>
                            <td>{{ $orderForm->phone }}</td>
                            <td>{{ $orderForm->email }}</td>
                            <td>{{ $orderForm->description }}</td>
                            <td>{{ $orderForm->created_at }}</td>
                            <td><a href="{{ route('hw_6.orderForm.edit', ['orderForm' => $orderForm]) }}">Изм.</a>&nbsp;<a href="#" style="color:red;">Уд.</a></td>
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
