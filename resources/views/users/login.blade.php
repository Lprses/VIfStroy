@extends('main')
@section('title') Авторизация @endsection
@section('content')
    <h2>Авторизация</h2>
    @if(!session()->has('success'))
        @error('auth')<div class="alert alert-danger">Логин или пароль не верный</div>@enderror
        @if(session()->has('register'))<div class="alert alert-light">Вы успешно зарагестрированы, авторизуйтесь</div>@endif
    @endif
    @auth
        <div class="alert alert-danger">Вы  уже авторизированы!</div>
    @endauth
    <div class="user-form">
        <form method="POST" action="">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Ваша почта</label>
                <input type="text" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="{{old('email')}}">
                @error('email') <div id="emailHelp" class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
                @error('password') <div id="passwordHelp" class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Авторизация</button>
            <p>У вас ещё нет аккаунта? - <a href="{{route('register')}}">Зарегистрироваться</a> </p>
        </form>
    </div>
@endsection
