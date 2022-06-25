@extends('main')
@section('title')Каталог@endsection
@section('content')
    <br>
    @auth
        @if(Auth::user()->role === 'admin')
            <form action="{{route('createproduct')}}">
                @csrf
                <button class="alert alert-info" type="submit">Добавить товар</button>
            </form>
        @endif
    @endauth
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link disabled">Фильтры</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('catalog') }}" class="nav-link @if(is_null(request()->get('filter'))) active @endif" aria-current="page">Все товары</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('catalog', ['filter' => 1]) }}" class="nav-link @if(request()->get('filter') === '1') active @endif" aria-current="page">Напольные покрытия</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request()->get('filter') === '2') active @endif" href="{{ route('catalog', ['filter' => 2]) }}">Потолочные системы</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(request()->get('filter') === '3') active @endif" href="{{ route('catalog', ['filter' => 3]) }}">Сайдинг и фурнитура</a>
        </li>
    </ul>
    <br>
    <div class="container">
        <div class="col-12">
            <div class="row mb-2">
                @foreach($requests->all() as $request)
                    <div class="col-3">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <img src="/public/storage/{{ $request->photo }}" class="card-img-top" style="max-width: 260px; max-height: 151px;" alt="{{ $request->name }}">
                                <h5 class="card-title">{{ $request->name }}</h5>
                                <p class="card-text">{{ $request->title_description }}</p>
                                <p class="card-text">Стоимость: {{ $request->price }}</p>
                                <a href="{{ route('product', ['product' => $request->id]) }}" class="btn btn-primary">Посмотреть</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $requests->links() }}
                </ul>
            </nav>
        </div>
    </div>

@endsection
