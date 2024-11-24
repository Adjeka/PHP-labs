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
<div class="leftcol">
    @yield('content')
</div>
<div class="rightcol">
    <ul class="menu">
        <li><a href="/">Резюме по профессиям</a></li>
        <li><a href="/personsWithExperience">Персоны со стажем от 5 до 15 лет</a></li>
        <li><a href="/programmers">Программисты</a></li>
        <li><a href="/totalResumes">Количество резюме</a></li>
        <li><a href="/professions">Профессии с резюме</a></li>
        <li><a href="/create">Добавить резюме</a></li>
    </ul>
</div>
<div class="footer">&copy; Copyright 2024</div>
</body>
</html>
