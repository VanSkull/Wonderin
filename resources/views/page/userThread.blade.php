@extends('layout.template')

@section('content')
    <div class="page-user-threads">
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
            <div class="circle-4" style="
                display: inline-block;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: #FFFFFF;
                "></div>
            {{-- <div class="circle-5" style="
                display: inline-block;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: #FFFFFF;
                "></div> --}}
            <div class="container">                
                @auth                    
                    @if (Auth::id() == $user->id) 
                    <div class="section-post-thread">
                        <h3>Poster un nouveau thread</h3>
                        <form action="/new/thread" method="post" enctype="multipart/form-data">
                            @csrf
                            <textarea name="thread" cols="30" rows="10" maxlength="255" placeholder="Exprimez-vous..." required></textarea>
                            <br/>
                            <input type="submit" value="Publier" />
                        </form>
                    </div>                
                    @endif                   
                @endauth
                <div class="section-all-threads">
                    <h3>Tous les threads</h3>
                    <div class="all-threads">
                        @foreach($threads as $t)
                            <div id="thread-{{ $t->id }}" class="single-thread">

                                <div class="main-thread">
                                    <div class="thread-text">
                                        <p>"{{ $t->content }}"</p>
                                    </div>
                                    <div class="thread-author-date">
                                        <img src="{{ $t->user->profilImg }}" alt="Photo de profil de {{ $t->user->pseudo }}">
                                        <p style="font-weight: lighter;">Écrit le {{ date('d/m/Y', strtotime($t->created_at)) }} par <span>@</span>{{ $t->user->pseudo }}</p>
                                    </div>
                                    <div class="thread-likes-comments">
                                        <div class="likes">
                                            @auth
                                                <form method="post" action="/like-thread/{{ $t->id }}">
                                                    @csrf
                                                    <button class="site-btn btn-line" type="submit">
                                                        <i class="fas fa-heart"></i> {{ $t->like()->count() }} like<span>@if($t->like()->count() > 1)s @endif</span>
                                                    </button>
                                                </form>                         
                                            @endauth
                                        </div>
                                        <div class="comments">
                                            <p><i class="fa fa-comments"></i> {{ $t->comment()->count() }} comment<span>@if($t->comment()->count() > 1)s @endif</span></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="section-comments">
                                    @auth
                                    <div class="comment-write">
                                        <form action="/comment-thread/{{ $t->id }}" method="post">
                                            @csrf
                                            <textarea name="comment" cols="20" rows="8" maxlength="255" placeholder="Commentez ici..." required></textarea><br/>
                                            <input type="submit">
                                        </form>
                                    </div>
                                    @endauth
                                    <h4>Tous les commentaires</h4>
                                    <div class="old-comments">
                                        @foreach($commentsThread as $comment)
                                            @if ($comment->idThread == $t->id)
                                            <div class="single-comment-thread">
                                                <div class="single-comment-thread__text">
                                                    <p>"{{ $comment->content }}"</p>
                                                </div> 
                                                <div class="single-comment-thread__written">
                                                    <img src="{{ $comment->user->profilImg }}" alt="Photo de profil de {{ $comment->user->pseudo }}">
                                                    <p>Écrit le {{ date('d/m/Y', strtotime($comment->created_at)) }} par <a href="/user/{{ $comment->user->pseudo }}"><span>@</span>{{ $comment->user->pseudo }}</a></p>
                                                </div> 
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ($user->threads()->count() == 0)
                            <p>Cet utilisateur n'a posté aucun thread pour le moment.</p>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>    
@endsection