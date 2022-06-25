<!-- upside -->
<div class="upside">
    <div class="item-section">
        <a class="item" href="#">
            <img src="/public/image/icons/tel.png">
            +7 49654 1‑53-88
        </a>
        <a class="item" href="#">
            <img src="/public/image/icons/phone.png">
            +7 49654 7‑86
        </a>
        <a class="item" href="#">
            <img src="/public/image/icons/time.png">
            пн-сб 8:30–19:00; вс 8:30–18:00
        </a>
    </div>
    <a class="after-item" href="#">
        <img src="/public/image/icons/mail.png">
        info@vifstroi.ru
    </a>
</div>
<!-- end of upside -->
<!-- header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}"><img src="/public/image/logo/try.png" alt=""></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('catalog')}}">Каталог</a>
                </li>
                @guest
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Пользователям
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('news')}}">Новости</a></li>
                            <li><a class="dropdown-item" href="{{route('contact')}}">Контакты</a></li>
                        </ul>
                    </li>
                @endguest
                @auth
                        @if(Auth::user()->role === 'user')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Пользователям
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item disabled" href="#">Доставка</a></li>
                                    <li><a class="dropdown-item" href="{{route('news')}}">Новости</a></li>
                                    <li><a class="dropdown-item" href="{{route('contact')}}">Контакты</a></li>
                                </ul>
                            </li>
                        @elseif(Auth::user()->role === 'admin')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Администрирование
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item active" href="{{route('news')}}">Новости</a></li>
                                </ul>
                            </li>
                        @endif
                @endauth
            </ul>
                @guest
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('login')}}">Авторизация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('register')}}">Регистрация</a>
                    </li>
                </ul>
                @endguest
                @auth
                    @if(Auth::user()->role === 'user')
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('account')}}">Личный кабинет</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('order.all')}}">Мои заказы</a>
                        </li>
                    </ul>
                    @elseif(Auth::user()->role === 'admin')
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('account')}}">Личный кабинет</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('order.all', ['myOrder' => 'admin'])}}">Просмотр заказов</a>
                        </li>
                    </ul>
                    @endif
                @endauth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">&#10084;Избраное</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('basket')}}">Корзина</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end of header -->
