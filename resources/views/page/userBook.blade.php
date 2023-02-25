@extends('layout.template')

@section('content')
    <div class="page-user-book">
        @include('partiels._enteteUserPage', ['user' => $user])

        <section class="main-contain">
            <div class="circle-1" style="
            display: inline-block;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 16px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-2" style="
                display: inline-block;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: transparent;
                "></div>
            <div class="circle-3" style="
                display: inline-block;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                border: 5px solid #901B22;
                background-color: transparent;
                "></div>
            <div class="circle-4" style="
                display: inline-block;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: transparent;
                "></div>
            <div class="circle-5" style="
                display: inline-block;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: transparent;
                "></div>
            <div class="container">
                <div class="profile-books-published">
                    <h3>Books publiés</h3>

                    <div class="profile-books-published__all-books">
                    
                    @if ($userBookPublished->count() == 0)
                        <p>Aucun book n'est encore publié pour cet auteur.</p>
                    @else
                        @foreach ($userBookPublished as $book)
                            <div class="single-book">
                                @auth
                                    @if (Auth::id() == $user->id) 
                                        <a href="/edit-book/{{ $book->id }}" class="link-edit-book" title="Modifier le book"><i class="fa-solid fa-pen"></i></a>
                                    @endif
                                @endauth
                                <a href="/book/{{ $book->id }}"><img src="{{ $book->imageCouverture }}" alt="Couverture_du_book {{ $book->name }}" /></a>
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
                                {{-- <div class="single-book__author">
                                    <p>Écrit</p>
                                </div> --}}
                                <div class="single-book__categories">
                                    <p>Catégorie : <a href="/category/{{ strtolower($book->category->name) }}">{{ $book->category->name }}</a></p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                
                @auth               
                    @if (Auth::id() == $user->id) 
                    <div class="profile-books-archived">
                        <h3>Books archivés</h3>

                        <div class="profile-books-archived__all-books">
                    
                        @if ($userBookArchived->count() == 0)
                            <p>Vous n'avez aucun book archivé pour le moment.</p>
                        @else                            
                            @foreach ($userBookArchived as $book)
                                <div class="single-book">
                                    @auth
                                        @if (Auth::id() == $user->id) 
                                            <a href="/edit-book/{{ $book->id }}" class="link-edit-book" title="Modifier le book"><i class="fa-solid fa-pen"></i></a>
                                        @endif
                                    @endauth
                                    <a href="/book/{{ $book->id }}"><img src="{{ $book->imageCouverture }}" alt="Couverture_du_book {{ $book->name }}" /></a>
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
                                    {{-- <div class="single-book__author">
                                        <p>Écrit</p>
                                    </div> --}}
                                    <div class="single-book__categories">
                                        <p>Catégorie : <a href="/category/{{ strtolower($book->category->name) }}">{{ $book->category->name }}</a></p>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="profile-books-draft">
                        <h3>Books à l'état de brouillon</h3>

                        <div class="profile-books-draft__all-books">
                    
                        @if ($userBookDraft->count() == 0)
                            <p>Vous n'avez aucun book à l'état de brouillon</p>
                        @else                            
                            @foreach ($userBookDraft as $book)
                                <div class="single-book">
                                    @auth
                                        @if (Auth::id() == $user->id) 
                                            <a href="/edit-book/{{ $book->id }}" class="link-edit-book" title="Modifier le book"><i class="fa-solid fa-pen"></i></a>
                                        @endif
                                    @endauth
                                    <a href="/book/{{ $book->id }}"><img src="{{ $book->imageCouverture }}" alt="Couverture_du_book {{ $book->name }}" /></a>
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
                                    {{-- <div class="single-book__author">
                                        <p>Écrit</p>
                                    </div> --}}
                                    <div class="single-book__categories">
                                        <p>Catégorie : <a href="/category/{{ strtolower($book->category->name) }}">{{ $book->category->name }}</a></p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </div>
                    </div>
                    @endif
                @endauth
            </div>
        </section>
    
    </div>
@endsection