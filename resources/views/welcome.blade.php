
@extends('layout.root')

@section('title', 'Arbusik.ru')

@section('head')
    <meta name="description" content="Главная страница">
@endsection

@section('body')
    <header class="text-center py-5">
        <h1 class="display-4 fw-bold">Найди попутчика легко с Arbusik</h1>
        <p class="lead text-muted">Совместные поездки, удобство и экономия</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg mt-3">Начать поиск</a>
    </header>

    <section class="container py-5">
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Создай поездку</h5>
                        <p class="card-text text-muted">Добавляй свои маршруты и ищи попутчиков.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Присоединяйся</h5>
                        <p class="card-text text-muted">Находи людей с похожими маршрутами и датами.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Экономь и путешествуй</h5>
                        <p class="card-text text-muted">Делите расходы и наслаждайтесь поездкой вместе.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

