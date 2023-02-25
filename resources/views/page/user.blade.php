@extends('layout.template')

@section('content')
    <div class="page-user">
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
                <div class="profile-books">
                    <h3>Books publiés</h3>

                    <div class="profile-books__all-books">
                        @if ($userBooks->count() == 0)
                            <p>Cet utilisateur n'a aucun book publié pour le moment.</p>
                        @else                            
                            @foreach ($userBooks as $book)
                                <div class="single-book">
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
                                    {{-- <div class="single-book__description">
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temport incididunt"</p>
                                    </div> --}}
                                    <div class="single-book__categories">
                                        <p>Catégorie : <a href="/category/{{ strtolower($book->category->name) }}">{{ $book->category->name }}</a></p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <a class="btn" href="/user/{{ $user->pseudo }}/book">Voir plus</a>
                </div>

                <div id="profile-favorites" class="profile-favorites">
                    <h3>Books favoris</h3>

                    <div class="profile-favorites__all-books">
                        @if ($user->ILikeBook->count() == 0)
                            <p>Cet utilisateur n'a aucun book enregistré dans ses favoris pour le moment.</p>
                        @else                            
                            {{-- @foreach ($userBooksFavorites as $book) --}}
                            @foreach ($user->ILikeBook as $book)
                                <div class="single-book">
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
                                    <div class="single-book__author">
                                        <p>Écrit par <a href="/user/{{ $book->auteur->pseudo }}"><span>@</span>{{ $book->auteur->pseudo }}</a>, le {{ date('d/m/Y', strtotime($book->created_at)) }}</p>
                                    </div>
                                    <div class="single-book__categories">
                                        <p>Categorie : <a href="/category/{{ strtolower($book->category->name) }}">{{ $book->category->name }}</a></p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <button class="btn"><i class="fas fa-angle-down"></i></button>
                </div>

                <div class="profile-last-threads">
                    <h3>Derniers threads</h3>

                    <div class="profile-last-threads__all-threads">
                        @if ($userThreads->count() == 0)
                            <p>Cet utilisateur n'a aucun book enregistré dans ses favoris pour le moment.</p>
                        @else                            
                            @foreach ($userThreads as $thread)
                                <div class="single-thread">
                                    <div class="main-thread">
                                        <div class="thread-text">
                                            <p>"{{ $thread->content }}"</p>
                                        </div>
                                        <div class="thread-author-date">
                                            <img src="{{ $thread->user->profilImg }}" alt="Photo de profil de {{ $thread->user->name }}">
                                            <p>Écrit par <a href="/user/{{ $thread->user->pseudo }}"><span>@</span>{{ $thread->user->pseudo }}</a>, le {{ date('d/m/Y', strtotime($thread->created_at)) }}</p>
                                        </div>
                                        <div class="thread-likes-comments">
                                            <p><i class="fas fa-heart"></i> {{ $thread->like->count() }} like<span>@if($thread->like->count() > 0)s @endif</span> / <i class="fa fa-comments"></i> {{ $thread->comment->count() }} comment<span>@if($thread->comment->count() > 0)s @endif</span></p>
                                        </div>
                                    </div>
                                    <div class="link-thread">
                                        <a href="/user/{{ $user->pseudo }}/thread#thread-{{ $thread->id }}">Voir le thread</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif                        
                    </div>

                    <a class="btn" href="/user/{{ $user->pseudo }}/thread">Voir plus</a>
                </div>
            </div>
        </section>
    
    </div>
@endsection