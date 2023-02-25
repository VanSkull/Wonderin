@extends('layout.template')

@section('content')
<div class="page-book-preview">
    <section class="section-entete">
        <h2>Présentation du book : {{ $book->name }}</h2>
    </section>    
    
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
            <div class="presentation-book">
                <div class="image-book">
                    <img src="{{ $book->imageCouverture }}" alt="Couverture_book_{{ $book->name }}">
                </div>
                <div class="text-book">
                    <h3>Titre : {{ $book->name }}</h3>
                    <p><strong>État</strong> : @if($book->state == "draft")
                        Brouillon
                    @elseif($book->state == "published")
                        Publié
                    @elseif($book->state == "archived")
                        Archivé
                    @endif</p>
                    <p><strong>Auteur</strong> : {{ $book->auteur->pseudo }}</p>
                    <p><strong>Catégorie</strong> : <a class="single-category" href="/category/{{ strtolower($book->category->name) }}">{{ $book->category->name }}</a></p>
                    <p><strong>Nombre de chapitre</strong> : {{ $book->chapters()->count() }}</p>
                    <a class="link-read-book" href="/book/{{ $book->id }}/1">Commencer la lecture</a>

                    <div class="section-comments">
                        <h3>Commentaires à propos du book</h3>

                        <div class="all-comments">
                            @auth
                                <div class="comment-write">
                                    <form action="/comment-book/{{ $book->id }}" method="post">
                                        @csrf
                                        <textarea name="comment" cols="20" rows="8" maxlength="255" placeholder="Votre avis ici..." required></textarea><br/>
                                        <input type="submit">
                                    </form>
                                </div>
                            @endauth
                            @if ($book->comments->count() > 0)
                                @foreach ($book->comments as $comment)
                                    <div class="single-comment">
                                        <div class="single-comment__text">
                                            <p>"{{ $comment->content }}"</p>
                                        </div> 
                                        <div class="single-comment__written">
                                            <img src="{{ $comment->user->profilImg }}" alt="Photo de profil de {{ $comment->user->pseudo }}">
                                            <div>
                                                <p>Écrit le {{ date('d/m/Y', strtotime($comment->created_at)) }} par <a href="/user/{{ $comment->user->pseudo }}"><span>@</span>{{ $comment->user->pseudo }}</a></p>
                                                <p><a class="link-like-comment-book" href="/like-comment-book/{{ $comment->id }}">
                                                    @auth
                                                        @if (Auth::user()->ILikeCommentBook->contains($comment->id))
                                                        <i style="color: #C2242D;" class="fas fa-heart"></i>
                                                        @else
                                                        <i class="far fa-heart"></i>
                                                        @endif
                                                    @endauth
                                                     {{ $comment->like()->count() }} like<span>@if($comment->like()->count() > 1)s @endif</span></a></p>
                                            </div>
                                        </div> 
                                    </div>
                                @endforeach
                            @else
                                <p>Aucun avis n'a encore rédigé pour ce book.</p>
                            @endif                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection