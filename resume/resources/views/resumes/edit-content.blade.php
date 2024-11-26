@extends('layouts.main')

@section('header', $header)

@section('content')
    <div class="container">
        <h1>Редактировать резюме</h1>
        <form method="POST" action="{{ route('update', $person->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>ФИО</label>
                <input type="text" name="FIO" class="form-control" value="{{ old('FIO', $person->FIO) }}" required>
            </div>
            <div class="form-group">
                <label>Профессия</label>
                <select name="staff_id" class="form-control" required>
                    @foreach($staff as $s)
                        <option value="{{ $s->id }}" {{ $s->id == old('staff_id', $person->staff_id) ? 'selected' : '' }}>
                            {{ $s->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Телефон</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $person->phone) }}" required>
            </div>
            <div class="form-group">
                <label>Стаж</label>
                <input type="text" name="stage" class="form-control" value="{{ old('stage', $person->stage) }}" required>
            </div>
            <div class="form-group">
                <label>Изображение</label>
                @if($person->image)
                    <div class="mb-2">
                        <img src="{{ asset('images/' . $person->image) }}" alt="Изображение" style="max-height: 150px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Сохранить изменения</button>
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
