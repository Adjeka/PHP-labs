@extends('layouts.main')

@section('header', $header)

@section('content')
    <table>
        <tr><th>ФИО</th><th>Стаж</th></tr>
        @foreach($persons as $person)
        <tr><td>{{ $person->FIO }}</td><td>{{ $person->stage }}</td></tr>
        @endforeach
    </table>
@endsection
