@extends('layouts.HW_main')

@section('content')
    <div style="margin: 10px">
        <h1>Вы перешли на страницу с текстом новости.</h1>
    </div>

    <div style="border: 2px solid rgb(168, 166, 166); margin: 10px; margin-top: 50px; ">
        <h2>Новость:</h2>
        <p>{{ $text }}</p>
    </div>
@endsection
