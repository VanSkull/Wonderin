@extends('layout.template')

@section('content')
<div class="page-index">
    <section class="section-week-selection">
        <div class="section-top">
            <h1>Sélection de<br/>la semaine</h1>
        </div>
        <div class="section-bottom">
            <div class="circle-1" style="
            display: inline-block;
            width: 160px;
            height: 160px;
            border-radius: 50%;
            border: 16px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="circle-2" style="
            display: inline-block;
            width: 325px;
            height: 325px;
            border-radius: 50%;
            border: 16px solid #901B22;
            background-color: transparent;
            "></div>
            <div class="container">
                <div class="livre">
                    <div class="img-book">
                        <img src="{{ $bookWeek->imageCouverture }}" alt="Couverture_book_{{ $bookWeek->name }}" />
                    </div>
                    <div class="presentation-book">
                        <h2 class="presentation-book__title">{{ $bookWeek->name }}</h2>
                        <div class="presentation-book__categories">
                            <a href="/category/{{ strtolower($bookWeek->category->name) }}" class="single-category">{{ $bookWeek->category->name }}</a>
                        </div>
                        <div class="presentation-book__written">
                            <p>Écrit par <a href="/user/{{ $bookWeek->auteur->pseudo }}"><span>@</span>{{ $bookWeek->auteur->pseudo }}</a>, le {{ date('d/m/Y', strtotime($bookWeek->created_at)) }}</p>
                        </div>
                        <div class="presentation-book__commentaire">
                            <p>"Entre merveilles et voyages, vous découvrirez de nouveaux horizons au travers des lignes de ce chef-d'œuvre. Je vous recommande ce book pour les sensations fortes et les émotions qu'il vous procurera."</p>
                        </div>
                        <div class="presentation-book__read-like">
                            @auth
                                @if(Auth::user()->ILikeBook->contains($bookWeek->id))
                                    <a href="/like-book/{{ $bookWeek->id }}" class="like"><i class="fa-solid fa-heart"></i></a>
                                @else
                                    <a href="/like-book/{{ $bookWeek->id }}" class="not-like"><i class="fa-regular fa-heart"></i></a>
                                @endif
                            @endauth
                            <a href="/book/{{ $bookWeek->id }}" class="link-book">Lire le book</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-new-books">
        <div class="circle-1" style="
        display: inline-block;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 8px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="circle-2" style="
        display: inline-block;
        width: 215px;
        height: 215px;
        border-radius: 50%;
        border: 16px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="circle-3" style="
        display: inline-block;
        width: 375px;
        height: 375px;
        border-radius: 50%;
        border: 16px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="container">
            <h2>Nouveaux books</h2>

            <div class="slider-new-books">
                @if ($newBooks->count() > 0)
                @foreach ($newBooks as $book)   
                <div>                 
                    <div class="book" onclick="viewBook('{{ strtolower($book->id) }}');">
                        <img src="{{ $book->imageCouverture }}" alt="Couverture_du_book_{{ $book->name }}" />
                        <div class="book__title">
                            <p><a href="/book/{{ $book->id }}">{{ $book->name }}</a></p>
                            @auth
                                @if(Auth::user()->ILikeBook->contains($book->id))
                                    <a href="/like-book/{{ $book->id }}" class="like"><i class="fa-solid fa-heart"></i></a>
                                @else
                                    <a href="/like-book/{{ $book->id }}" class="not-like"><i class="fa-regular fa-heart"></i></a>
                                @endif
                            @endauth
                        </div>
                        <div class="book__description">
                            <p>Écrit par <a href="/user/{{ $book->auteur->pseudo }}"><span>@</span>{{ $book->auteur->pseudo }}</a>, le {{ date('d/m/Y', strtotime($book->created_at)) }}</p>
                        </div>
                        <div class="book__categories">
                            <a class="single-category" href="/category/{{ strtolower($book->category->name) }}">{{ $book->category->name }}</a>
                        </div>
                    </div>
                </div>
                @endforeach                    
                @else
                    <p>Aucun book n'a encore été créé pour le moment.</p>
                @endif
            </div>
        </div>
    </section>
    <section class="section-famous-users">
        <div class="circle-1" style="
        display: inline-block;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 8px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="circle-2" style="
        display: inline-block;
        width: 215px;
        height: 215px;
        border-radius: 50%;
        border: 16px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="circle-3" style="
        display: inline-block;
        width: 375px;
        height: 375px;
        border-radius: 50%;
        border: 16px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="container">
            <h2>Utilisateurs populaires</h2>

            <div class="slider-famous-users">
                @if ($usersFamous->count() > 0)
                    @foreach ($usersFamous as $user)
                    <div style="padding: 20px;">   
                        <div class="user">
                            <img class="user__banner" src="{{ $user->bannerImg }}" alt="Banner_User_{{ $user->pseudo }}" />
                            <img class="user__profil" src="{{ $user->profilImg }}" alt="Profil_User_{{ $user->pseudo }}" />
                            <p class="user__name"><strong>{{ $user->name }}</strong></p>
                            <p class="user__pseudo"><span>@</span>{{ $user->pseudo }}</p>
                            <a href="/user/{{ $user->pseudo }}">Voir profil</a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>Aucun utilisateur est encore enregistré pour le moment.</p>
                @endif
            </div>
        </div>
    </section>
    <section class="section-new-users">
        <div class="circle-1" style="
        display: inline-block;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 8px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="circle-2" style="
        display: inline-block;
        width: 215px;
        height: 215px;
        border-radius: 50%;
        border: 16px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="circle-3" style="
        display: inline-block;
        width: 375px;
        height: 375px;
        border-radius: 50%;
        border: 16px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="container">
            <h2>Nouveaux utilisateurs</h2>
            
            <div class="slider-new-users">
                @if ($usersNew->count() > 0)
                    @foreach ($usersNew as $user)  
                    <div style="padding: 20px;"> 
                        <div class="user">
                            <img class="user__banner" src="{{ $user->bannerImg }}" alt="Banner_User_{{ $user->pseudo }}" />
                            <img class="user__profil" src="{{ $user->profilImg }}" alt="Profil_User_{{ $user->pseudo }}" />
                            <p class="user__name"><strong>{{ $user->name }}</strong></p>
                            <p class="user__pseudo"><span>@</span>{{ $user->pseudo }}</p>
                            <a href="/user/{{ $user->pseudo }}">Voir profil</a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>Aucun utilisateur est encore enregistré pour le moment.</p>
                @endif
            </div>
        </div>
    </section>
    <section class="section-famous-categories">
        <div class="circle-1" style="
        display: inline-block;
        width: 75px;
        height: 75px;
        border-radius: 50%;
        border: 8px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="circle-2" style="
        display: inline-block;
        width: 215px;
        height: 215px;
        border-radius: 50%;
        border: 16px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="circle-3" style="
        display: inline-block;
        width: 375px;
        height: 375px;
        border-radius: 50%;
        border: 16px solid #901B22;
        background-color: transparent;
        "></div>
        <div class="container">
            <h2>Catégories populaires</h2>
    
            <div class="slider-famous-categories">
                @foreach ($categoriesFamous as $category)
                <div>   
                    <div class="category" onclick="viewCategory('{{ strtolower($category->name) }}');">
                        <p>{{ $category->name }}</p>
                        <img src="/images/categories/category_{{ $category->id }}.png" alt="Image_{{ $category->name }}">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection