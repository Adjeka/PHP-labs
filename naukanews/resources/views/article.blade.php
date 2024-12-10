@extends('layouts.main')

@section('title', $article->title)

@section('header')
    <div class="row">
        <h4>Автоматическая обработка текста</h4>
        <article>
            <div class="twelve columns">
                <h1>{{ $article->title }}</h1>
                <p class="excerpt">
                    {{ $article->lid }}
                </p>
            </div>
        </article>
    </div>
@endsection

@section('content')
    <section class="section_light">
        <div class="row">
            <p>
                <img src="{{ asset('images/' . $article->image) }}" alt="desc" width=400 align=left hspace=30>
                {{ $article->content }}
            </p>
        </div>
    </section>
@endsection
