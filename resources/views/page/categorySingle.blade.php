@extends('layout.template')

@section('content')
    <div class="page-single-category">
        <section class="recent-searches">
            <h2>Recherches récentes</h2>
            <div class="recent-searches__all-searches">
                <i class='fas fa-search'></i>
                <ul>
                    <li><a href="/search/Surprise">Surprise</a></li>
                    <li><a href="/search/Monet">Monet</a></li>
                    <li><a href="/search/Paranormal">Paranormal</a></li>
                    <li><a href="/search/Aventure">Aventure</a></li>
                    <li><a href="/search/Victor Hugo">Victor Hugo</a></li>
                    <li><a href="/search/Politique">Politique</a></li>
                    <li><a href="/search/John Green">John Green</a></li>
                    <li><a href="/search/Amour">Amour</a></li>
                    <li><a href="/search/Italien">Italien</a></li>
                    <li><a href="/search/Peur">Peur</a></li>
                    <li><a href="/search/Cuisine">Cuisine</a></li>
                </ul>
            </div>
        </section>

        <section class="main-contain">
            <div class="circle-1" style="
            display: inline-block;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 8px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-2" style="
            display: inline-block;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 8px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-3" style="
            display: inline-block;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 12px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-4" style="
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 4px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-5" style="
            display: inline-block;
            width: 128px;
            height: 128px;
            border-radius: 50%;
            border: 12px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-6" style="
            display: inline-block;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 16px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-7" style="
            display: inline-block;
            width: 85px;
            height: 85px;
            border-radius: 50%;
            border: 8px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="container">
                <h1>Tous les books de la catégorie : "{{ $category->name }}"</h1>        
                
                @if ($books->count() == 0)
                    <p>Aucun book publié n'est lié à cette catégorie.</p>
                @else
                <ul>
                    @foreach ($books as $book)
                    <li>
                        <div class="single-book">
                            <img src="{{ $book->imageCouverture }}" alt="Couverture_du_book_{{ $book->name }}" />
                            <div class="single-book__title">
                                <p><a href="/book/{{ $book->id }}">{{ $book->name }}</a></p>
                                @auth
                                    @if(Auth::user()->ILikeBook->contains($book->id))
                                        <a href="/like-book/{{ $book->id }}" class="like"><i class="fa-solid fa-heart"></i></a>
                                    @else
                                        <a href="/like-book/{{ $book->id }}" class="not-like"><i class="fa-regular fa-heart"></i></a>
                                    @endif
                                @endauth
                            </div>
                            <div class="single-book__description">
                                <p>Écrit par <a href="/user/{{ $book->auteur->pseudo }}"><span>@</span>{{ $book->auteur->pseudo }}</a>, le {{ date('d/m/Y', strtotime($book->created_at)) }}</p>
                            </div>
                            <div class="single-book__categories">
                                <p><strong>Catégorie :</strong> <a class="single-category" href="/category/{{ strtolower($book->category->name) }}">{{ $book->category->name }}</a></p>
                            </div>
                            <div class="single-book__link">
                                <p><a href="/book/{{ $book->id }}">Voir plus</a></p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </section>
    </div>
@endsection