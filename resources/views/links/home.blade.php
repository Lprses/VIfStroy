@extends('main')
@section('title') Главная @endsection
@section('content')
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="/public/image/background/vifstroy.jpg" style="height: 500px;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>"Виф Строй" является дилером крупнейших российских и зарубежных производителей строительных и отделочных материалов, продукция которых сертифицирована в соответствии с требованиями международных стандартов качества ISO, а торговые марки широко известны на российском рынке.</h5>
                        <a href="{{route('catalog')}} " class="btn btn-primary">Каталог товаров.</a>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="10000">
                    <img src="/public/image/background/XXL.jpg " style="height: 500px;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Компания Магазин Вифстрой находится в Сергиевом Посаде и расположена по адресу Московская обл., Сергиев Посад г., ул. Вифанская, 27.</h5>
                        <br>
                        <a href="{{route('contact')}} " class="btn btn-primary">Как  добраться?</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/public/image/background/15444.jpg" style="height: 500px;" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Огромный ассортимент товаров для стройки и ремонта: электротовары, сантехника, метизы, хозтовары, стройматериалы, линолеумы, ламинат.</h5>
                        <br>
                        <a href="{{route('contact')}}" class="btn btn-primary">Условия доставки.</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    <div class="second container mt-4">
        <p><br><br>Лучшие цены в области!</p>
        <p><br><br>Все для строительства и ремонта!</p>
        <p><br><br>Гарантийное обслуживание!</p>
        <p><br><br>Аксессуары для интерьера!</p>
    </div>
    <div class="check">
        <div class="check-content">
            <img src="public/image/1-4.png" alt="">
            <nav>
                <h2>Наши преимущества</h2>
                <p>Широкий ассортимент товаров для хорошего ремонта Вашего дома или офиса.</p>
                <p>Большой товарный запас на нашем складе.</p>
                <p>Высокое качество обслуживания.</p>
                <p>Конкурентные цены.</p>
                <form action="{{route('news')}}">
                    <button>Узнайте больше</button>
                </form>
            </nav>
        </div>
    </div>
    <br><br><br><br>
@endsection
