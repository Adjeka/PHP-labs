@extends('layouts.main')

@section('header', $header)

@section('content')
    <div class="pinline1">
        <img class="pic" src="/images/{{ $data['Аватар'] }}" alt="Аватар">
    </div>
    <p class="pinline second">
        {{ $data['Фамилия'] }}<br>
        Телефон: {{ $data['Телефон'] }}
    </p>
    <p class="pinline third">
        {{ $data['Профессия'] }}<br>
        Стаж: {{ $data['Стаж'] }}
    </p>
@endsection

