<!DOCTYPE html>
<html>
<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>@yield('header')</title>
</head>
<body>
<div class="header">
    @yield('header')
    <div id="logo"></div>
</div>
<div class="leftcol"><!--**************Основное содержание страницы************-->
    @yield('content')
</div>
<div class="rightcol">
    <ul class="menu">
        <li><a href="">Вакансии</a></li>
        <li><a href="">Резюме по профессиям</a></li>
        <li><a href="">Резюме по возрасту</a></li>
        <li><a href="">Избранное резюме</a></li>
    </ul>
</div>
<div class="footer">&copy; Copyright 2024</div>
</body>
</html>
