<!-- intro section start -->
<section class="intro-section">

    <div class="intro-section__entete">
        <div class="container">
            <h1>{{ $user->name }}</h1>
            <p class="user-pseudo"><span>@</span>{{ $user->pseudo }}</p>
            @auth
                @if(Auth::id() != $user->id)
                <form method="post" action="/follow-user/{{ $user->id }}">
                    @csrf
                    @if(Auth::user()->IFollowThem->contains($user->id))
                        <button class="btn-suivi" type="submit">Suivi</button>
                    @else
                        <button class="btn-suivre" type="submit">Suivre</button>
                    @endif
                </form> 
                @endif
            @endauth
        </div>
    </div>
    <div class="intro-section__infos">
        <div class="container">
            <h2>À propos de moi</h2>
            <p class="infos-principal">
                <span class="location">
                    @if (!empty($user->country) || !empty($user->city))
                    <i class="fa-solid fa-location-dot"></i>
                    @endif
                    @if (!empty($user->country))
                    {{ ucfirst($user->country) }}
                    @endif
                    @if (!empty($user->country) && !empty($user->city))
                    ,
                    @endif
                    @if (!empty($user->city))
                    {{ ucfirst($user->city) }}
                    @endif
                </span>
                <br/>
                <span class="age"><strong>Age :</strong> {{ date_diff(date_create($user->date_of_birth), date_create(date("Y-m-d")))->format('%y') }}</span> ans / <span class="birthday"><strong>Anniversaire :</strong> {{ date('d/m/Y', strtotime($user->date_of_birth)) }}</span>
            </p>
            <p class="infos-description">
                "{{ $user->description }}"
            </p>
            <div class="infos-photo-more">
                <img src="{{ $user->profilImg }}" alt="Profil_User_{{ $user->pseudo }}" />
                <p>{{ $user->books()->count() }} Book<span>@if($user->books()->count() > 1)s @endif</span>  /  {{ $user->threads()->count() }} Thread<span>@if($user->threads()->count() > 1)s @endif</span>  /  {{ $user->TheyFollowMe()->count() }} Follower<span>@if($user->TheyFollowMe()->count() > 1)s @endif</span></p>
            </div>
        </div>
    </div>
    {{-- <div class="container text-center">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <p>Image banner</p>
                <img src="{{ $user->bannerImg }}" alt="Banner_User_{{ $user->pseudo }}" />
                <p>Image profil</p>
                <img src="{{ $user->profilImg }}" alt="Profil_User_{{ $user->pseudo }}" />

                <h2 class="section-title">Page de l'utilisateur "{{ $user->name }}"</h2>
                <p><span>@</span>{{ $user->pseudo }}</p>
                <p>
                    @if (!empty($user->country) || !empty($user->city))
                    <i class="fa-solid fa-location-dot"></i>
                    @endif
                    @if (!empty($user->country))
                    {{ ucfirst($user->country) }}
                    @endif
                    @if (!empty($user->country) && !empty($user->city))
                    ,
                    @endif
                    @if (!empty($user->city))
                    {{ ucfirst($user->city) }}
                    @endif
                </p>
                <br/>
                <p>{{ $user->books()->count() }} Book<span>@if($user->books()->count() > 1)s @endif</span> / {{ $user->threads()->count() }} Thread<span>@if($user->threads()->count() > 1)s @endif</span> / {{ $user->TheyFollowMe()->count() }} Follower<span>@if($user->TheyFollowMe()->count() > 1)s @endif</span></p>
                <br/>
                <p>{{ $user->description }}</p>
                <br/>
                @auth
                @if (Auth::id() != $user->id)   
                        <form method="post" action="/follow-user/{{ $user->id }}">
                            @csrf
                            <button class="site-btn btn-line" type="submit">
                                @if (Auth::user()->IFollowThem->contains($user->id))
                                    Suivi
                                @else
                                    Suivre
                                @endif
                            </button>
                        </form>                         
                    @endif                        
                @endauth
                <br/>
                <br/>
                <br/>
            </div>
        </div>
    </div> --}}
</section>
<!-- intro section end -->

<section class="menu-section">
    <div class="container">
        <ul>
            <li><a href="/user/{{ $user->pseudo }}">Profil</a></li>
            <li><a href="/user/{{ $user->pseudo }}/book">Books</a></li>
            <li><a href="/user/{{ $user->pseudo }}#profile-favorites">Favoris</a></li>
            <li><a href="/user/{{ $user->pseudo }}/thread">Threads</a></li>
            <li><a href="/user/{{ $user->pseudo }}/following">Followers</a></li>
            @auth                    
                @if (Auth::id() == $user->id) 
                    <li><a class="btn" href="/create-new-book">Créer un nouveau book</a></li>
                @endif
            @endauth
        </ul>
    </div>
</section>