<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Wonderin' - Venez découvrir d'autres mondes</title>

        <meta name="description" content="Venez découvrir des univers litéraires ">
        <meta name="keywords" content="pictures, laravel, book, wonderin, wondering, livres, création, lecture">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link href="/favicon.ico" rel="shortcut icon"/>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
        <!-- <link rel="stylesheet" href="/css/bootstrap.min.css"/> -->
        <!-- <link rel="stylesheet" href="/css/font-awesome.min.css"/> -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="/css/magnific-popup.css"/>
        <link rel="stylesheet" href="/css/normalize.css"/>
        <link rel="stylesheet" href="/css/style.css"/>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="body general-template">
        <!-- Start Header -->
        <header class="header">
            <div id="logo">
                <a href="/"><img src="/images/logo.png" alt="main-logo" width="150" /></a>
                {{-- <span>Wondering</span> --}}
            </div>

            <form id="search">
                <button type="submit" class="header-btn"><i class="fa fa-search"></i></button>
                <input type="search" placeholder="Recherche..." class="header-btn" name="search" />
            </form>

            <nav id="main-menu">
                <ul>
                    <li><a href="/">Accueil</a></li>
                    <li><a href="/book">Tous les livres</a></li>
                    <li><a href="/category">Toutes les catégories</a></li>
                    <li><a href="/about">À propos</a></li>
                </ul>
            </nav>

            <div class="header-user">
                <nav>
                    <ul>
                        @guest
                            <li class="login">
                                <a href="{{ route('login') }}">Connexion</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="register">
                                    <a href="{{ route('register') }}">Inscription</a>
                                </li>
                            @endif
                        @else
                            <li class="user">
                                <div class="preview-user">
                                    <img src="{{ Auth::user()->profilImg }}" alt="Image_profil_{{ Auth::user()->name }}">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="menu-user">
                                    <p><strong>{{ Auth::user()->name }}</strong></p>
                                    <p><span>@</span>{{ Auth::user()->pseudo }}</p>
                                    <ul class="menu">
                                        <li><a href="/user/{{ Auth::user()->pseudo }}">Voir profil</a></li>
                                        <li><a href="/user/settings">Modifier profil</a></li>
                                        <li><a href="/user/{{ Auth::user()->pseudo }}/book">Mes livres</a></li>
                                        <li><a href="/create-new-book">Créer un livre</a></li>
                                        <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                Déconnexion
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form></li>
                                    </ul>
                                </div>

                                {{-- <a href="/user/settings"><i class="fa fa-solid fa-pen"></i></a> --}}
                                {{-- <a href="/user/{{ Auth::id() }}">{{ Auth::user()->name }}</a> --}}
                                {{-- <a href="/user/{{ Auth::user()->pseudo }}">{{ Auth::user()->name }}</a> --}}
                                {{-- <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form> --}}
                            </li>
                        @endguest
                    </ul>                    
                </nav>

            </div>
        </header>
        <!-- End Header -->
        
        <div class="main-content">
            @yield('content')
        </div>

        <!-- Start Footer -->
        <footer class="footer">
            <div id="logo-footer">
                <img src="/images/logo.png" alt="main-logo" width="150" />
                {{-- <span>Wondering</span> --}}
            </div>

            <div class="copyright">
                <p>© Copyright Wonderin' - Tous droits réservés à Valentin VANHAECKE et Eva VILLALOBOS PEREZ</p>
            </div>

            <div class="social-networks">
                <p>Suivez nous</p>
                <ul>
                    <li><a href="https://www.instagram.com/"><span class="fa-brands fa-instagram"></span></a></li>
                    <li><a href="https://www.facebook.com/"><span class="fa-brands fa-facebook"></span></a></li>
                    <li><a href="https://twitter.com/"><span class="fa-brands fa-twitter"></span></a></li>
                </ul>
            </div>
        </footer>
        <!-- End Footer -->

        <!--====== Javascripts & Jquery ======-->
        <script src="/js/jquery-3.6.0.js"></script>
        <!-- <script src="/js/bootstrap.min.js"></script> -->
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="/js/magnific-popup.min.js"></script>
        <script src="/js/divers.js"></script>
    </body>
</html>