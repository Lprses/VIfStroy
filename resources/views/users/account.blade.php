@extends('main')
@section('title')Личный кабинет@endsection
@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success">Вы успешно авторизированы!</div>
    @endif
    @guest
        <p>У вас нет доступа к данной странице,<a href="{{route('home')}}"> вернитесь на главную</a></p>
    @endguest
    @auth
        <br>
        <h3>Личный кабинет</h3>
        <br>
        <div class="section h3"><b>ФИО:</b> {{ Auth::user()->fullname }}</div>
        <div class="section h3"><b>Номер телефона:</b> {{ Auth::user()->phone }}</div>
        <div class="section h3"><b>Адрес электронной почты:</b> {{ Auth::user()->email }}</div>
        <br><br>
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="btn btn-outline-danger" href="{{route('logout')}}">Выход</a>
        </li>
    </ul>
    @endauth
@endsection
