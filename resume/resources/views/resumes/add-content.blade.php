@extends('layouts.main')

@section('header', $header)

@section('content')
    <div class="container">
        <h1>Добавить резюме</h1>
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>ФИО</label>
                <input type="text" name="FIO" class="form-control" value="{{ old('FIO') }}" required>
            </div>
            <div class="form-group">
                <label>Профессия</label>
                <select name="staff_id" class="form-control" required>
                    @foreach($staff as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Телефон</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>
            <div class="form-group">
                <label>Стаж</label>
                <input type="text" name="stage" class="form-control" value="{{ old('stage') }}" required>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
