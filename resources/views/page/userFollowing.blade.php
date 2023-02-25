@extends('layout.template')

@section('content')
    <div class="page-user-followers">
        @include('partiels._enteteUserPage', ['user' => $user])

        <section class="main-contain">
            <div class="circle-1" style="
            display: inline-block;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 16px solid #901B22;
            background-color: #FFFFFF;
            "></div>
            <div class="circle-2" style="
                display: inline-block;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: #FFFFFF;
                "></div>
            <div class="circle-3" style="
                display: inline-block;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                border: 5px solid #901B22;
                background-color: #FFFFFF;
                "></div>
            {{-- <div class="circle-4" style="
                display: inline-block;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: #FFFFFF;
                "></div> --}}
            {{-- <div class="circle-5" style="
                display: inline-block;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: #FFFFFF;
                "></div> --}}
            <div class="container">
                <div class="all-followers">
                    @foreach ($user->TheyFollowMe as $follower)
                    <div class="follower">
                        <img class="follower__banner" src="{{ $follower->bannerImg }}" alt="Banner_User_{{ $follower->pseudo }}" />
                        <img class="follower__profil" src="{{ $follower->profilImg }}" alt="Profil_User_{{ $follower->pseudo }}" />
                        <p class="follower__name"><strong>{{ $follower->name }}</strong></p>
                        <p class="follower__pseudo"><span>@</span>{{ $follower->pseudo }}</p>
                        <a href="/user/{{ $follower->pseudo }}">Voir profil</a>
                    </div>
                    @endforeach
                </div>
                @if ($user->TheyFollowMe()->count() == 0)
                    <p>Personne ne suit cet utilisateur</p>
                    @auth
                        @if (Auth::id() != $user->id) 
                            <p>Soyez la 1er personne à la suivre</p>
                            <form method="post" action="/follow-user/{{ $user->id }}">
                                @csrf
                                <button class="site-btn btn-line" type="submit">
                                    Suivre
                                </button>
                            </form> 
                        @endif
                    @endauth
                @endif
            </div>
        </section>
    </div>

{{--     <!-- intro section start -->
    <section class="intro-section">
        <div class="container text-center">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <h2 class="section-title">Page des followers de l'utilisateur "{{$user->name}}"</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- intro section end -->
    <section class="following-section">
        <div class="container text-center">
                
            @foreach ($user->TheyFollowMe as $follower)
                <div class="follower" style="margin: 5px; border: 1px red solid;">
                    <a href="/user/{{ $follower->pseudo }}">
                        <img src="{{ $follower->bannerImg }}" alt="Banner_User_{{ $follower->pseudo }}" />
                        <img src="{{ $follower->profilImg }}" alt="Profil_User_{{ $follower->pseudo }}" />
                        <p><strong>{{ $follower->name }}</strong></p>
                        <p><span>@</span>{{ $follower->pseudo }}</p>
                    </a>
                </div>
            @endforeach
            @if ($user->TheyFollowMe()->count() == 0)
                <p>Personne ne suit cet utilisateur</p>
                @auth
                    <p>Soyez la 1er personne à la suivre</p>
                    <form method="post" action="/follow-user/{{ $user->id }}">
                        @csrf
                        <button class="site-btn btn-line" type="submit">
                            Suivre
                        </button>
                    </form> 
                @endauth
            @endif
        </div>
    </section> --}}
    
@endsection