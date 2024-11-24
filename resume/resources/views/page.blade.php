@extends('layouts.main')

@section('header', $header)

@section('content')
    @foreach($staffs as $staff)
        @if($staff->persons->isNotEmpty())
            <h2>{{ $staff->name }}</h2>
            @foreach($staff->persons as $person)
                <div class="pinline1">
                    <a href="{{ route('show', $person->id) }}" class="btn btn-primary">
                        <img class="pic" src="{{ asset('images/' . $person->image) }}" alt="Аватар">
                    </a>
                </div>
                <section class="pinline second">
                    {{ $person->FIO }}<br>
                    Телефон: {{ $person->phone }}<br><br>
                    <span class="pinline third">
                        Стаж: {{ $person->stage }}
                    </span>
                    <section style="display: flex; gap: 16px; font-size: 16px;">
                        <a href="{{ route('edit', $person->id) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('delete', $person->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </section>
                </section>
            @endforeach
        @endif
    @endforeach
@endsection
