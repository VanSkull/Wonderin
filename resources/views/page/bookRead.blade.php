@extends('layout.template')

@section('content')
    <div class="page-book">
        <section class="entete-section">
            <div class="couverture-book">
                <img src="{{ $book->imageCouverture }}" alt="Couverture_book_{{ $book->name }}">
            </div>
            <div class="description-book">
                <h1 class="description-book__title">{{ $book->name }}</h1>
                <p class="description-book__author">Écrit par <a href="/user/{{ $book->auteur->pseudo }}"><span>@</span>{{ $book->auteur->pseudo }}</a></p>
                <h2 class="description-book__chapter">Chapitre {{ $chapter->numChapter }} : "{{ $chapter->title }}"</h2>
            </div>
        </section>
        <div class="content-book">  
            <div class="circle-1" style="
            display: inline-block;
            width: 396px;
            height: 396px;
            border-radius: 50%;
            border: 8px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-2" style="
            display: inline-block;
            width: 125px;
            height: 125px;
            border-radius: 50%;
            border: 12px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-3" style="
            display: inline-block;
            width: 112px;
            height: 112px;
            border-radius: 50%;
            border: 5px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="container">
                <div class="content-chapter-text">
                    {!! $chapter->content !!}
                </div>
            </div>
        </div>
        <div class="navigation-book">
            <div class="container">
                <ul>
                    @if ( (intval($chapter->numChapter) - 1) >= 1 )
                    <li><a href="/book/{{ $book->id }}/{{ intval($chapter->numChapter) - 1 }}">Chapitre précédent</a></li>
                    @endif
                    
                    @if ( (intval($chapter->numChapter) + 1) <= $book->chapters()->count() )
                    <li><a href="/book/{{ $book->id }}/{{ intval($chapter->numChapter) + 1 }}">Chapitre suivant</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

@endsection