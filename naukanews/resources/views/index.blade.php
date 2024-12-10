@extends('layouts.main')

@section('title', $header)

@section('header')
    <h1>{{ $header }}</h1>
@endsection

@section('content')
    <section>
        <div class="section_main">
            <div class="row">
                <section class="eight columns">
                    @foreach($articles as $article)
                        <article class="blog_post">
                            <div class="three columns">
                                <a href="{{ route('article', $article->id) }}" class="th"><img src="{{ asset('images/' . $article->image) }}" alt="desc" /></a>
                            </div>

                            <div class="nine columns">
                                <a href="{{ route('article', $article->id) }}"><h4>{{ $article->title }}</h4></a>
                                <p>{{ $article->lid }}</p>
                                <div>
                                    <a href="{{ route('delete', $article->id) }}" >Удалить</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </section>
                <section class="four columns">
                    <h3>  &nbsp; </h3>
                    <div class="panel">
                        <h3>Админ-панель</h3>

                        <ul class="accordion">
                            <li class="active">
                                <div class="title">
                                    <a href="{{ route('add') }}"><h5>Добавить статью</h5></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection

@section('dark-section')
    <section>
        <div class="section_dark">
            <div class="row">
                <h2></h2>

                <div class="two columns">
                    <img src="{{ asset('images/thumb1.jpg') }}" alt="desc" />
                </div>

                <div class="two columns">
                    <img src="{{ asset('images/thumb2.jpg') }}" alt="desc" />
                </div>

                <div class="two columns">
                    <img src="{{ asset('images/thumb3.jpg') }}" alt="desc" />
                </div>

                <div class="two columns">
                    <img src="{{ asset('images/thumb4.jpg') }}" alt="desc" />
                </div>

                <div class="two columns">
                    <img src="{{ asset('images/thumb5.jpg') }}" alt="desc" />
                </div>

                <div class="two columns">
                    <img src="{{ asset('images/thumb6.jpg') }}" alt="desc" />
                </div>
            </div>
        </div>
    </section>
@endsection
