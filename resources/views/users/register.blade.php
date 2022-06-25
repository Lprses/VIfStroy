@extends('main')
@section('title') Регистрация @endsection
@section('content')
    <h2>Регистрация</h2>
    <div class="user-form">
        <form method="POST" action="">
            @csrf
            @if(session()->has('register'))
                <h2 class="alert-success">Регистрация прошла успешно</h2>
            @endif
            <div class="mb-3">
                <label for="exampleInputPhone" class="form-label">Укажите ваш номер телефона</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="phone" name="phone" value="{{ old('phone') }}">
                <label for="exampleInputPhone" class="form-label">Указывается 10 символов без 8</label>
                @error('phone') <div id="phoneHelp" class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Укажите вашу почту</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email" value="{{old('email')}}">
                @error('email') <div id="emailHelp" class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputFullname" class="form-label">Укажите ваше полное Ф.И.О.</label>
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="exampleInputFullname" aria-describedby="fullnameHelp" placeholder="FIO" name="fullname" value="{{old('fullname')}}">
                @error('fullname') <div id="fullnameHelp" class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Придумайте пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" aria-describedby="passwordHelp" placeholder="password" name="password">
                @error('password') <div id="passwordHelp" class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword2" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword2" aria-describedby="password_confirmationHelp" placeholder="confirm password" name="password_confirmation">
                @error('password') <div id="passwordHelp" class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="btn btn-primary">Регистрация</button>
        </form>
    </div>
@endsection
