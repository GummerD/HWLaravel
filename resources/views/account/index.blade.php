@extends('layouts.app')
@section('content')
    <div class="col-8 offset-2">
        <h2> Добро пожаловать, {{ Auth::user()->name }} </h2>
        <br>
        <h2> Электронная почта:{{ Auth::user()->email }} </h2>
        <br>
        @if (Auth::user()->avatar)
            <img src="{{ Auth::user()->avatar }}" style="width: 200px; hight:200px" alt="Аватар">
        @endif
        <br>
        <br>
        @if (Auth::user()->is_admin === true)
            <a href="{{ route('admin.index') }}">В админку</a>
        @endif
    </div>
@endsection
