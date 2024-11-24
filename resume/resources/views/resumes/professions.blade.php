@extends('layouts.main')

@section('header', $header)

@section('content')
    <table>
    <tr><th>Профессии</th></tr>
    @foreach($professions as $profession)
    <tr><td>{{ $profession }}</td></tr>
    @endforeach
    </table>
@endsection
