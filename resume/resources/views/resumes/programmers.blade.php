@extends('layouts.main')

@section('header', $header)

@section('content')
    <table>
        <tr><th>ФИО</th><th>Стаж</th></tr>
        @foreach($programmers as $programmer)
        <tr><td>{{ $programmer->FIO }}</td><td>{{ $programmer->stage }}</td></tr>
        @endforeach
    </table>
@endsection
