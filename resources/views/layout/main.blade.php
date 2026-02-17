@extends('layout.root')

@section('body')
    <!-- Весь контент страницы идёт сюда -->
    @yield('content')
@endsection

<!-- Если нужны дополнительные стили только для этой страницы -->
@section('head')
    <!-- Здесь могут быть дополнительные meta-теги или стили -->
@endsection
