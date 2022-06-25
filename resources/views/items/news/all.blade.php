@extends('main')
@section('title')Новости@endsection
@section('content')
    <h2>Все новости</h2>
    <br>
    @auth
        @if(Auth::user()->role === 'admin')
            <form action="{{route('createproduct')}}">
                @csrf
                <button class="alert alert-info" type="submit">Добавить новость</button>
            </form>
        @endif
    @endauth
    <div class="container all-items wrapped" id="all-items">
        @foreach($requests->all() as $request)
            <div class="card" style="width: 18rem;">
                <p class="card-text">{{$request->name}}</p>
                <img src="/public/storage/{{$request->photo}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">{{$request->title_description}}</p>
                    <p class="card-text">{{$request->date}}</p>
                </div>
            </div>
    @endforeach
@endsection
