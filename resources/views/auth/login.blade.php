{{-- @extends('layout.template') --}}

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Connexion - Wonderin'</title>

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
        <link rel="stylesheet" href="/css/magnific-popup.css"/>
        <link rel="stylesheet" href="/css/normalize.css"/>
        <link rel="stylesheet" href="/css/style.css"/>


        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="page-login">
        <header class="header">

            <button class="menu-burger-open">
                <span class="fa-solid fa-bars"></span>
            </button>

            <div class="menu-burger">
                <button class="menu-burger-close">
                    <span class="fa-solid fa-xmark"></span>
                </button>
                <nav class="font-exo-regular">
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        {{-- <li><a href="/">Tags</a></li>
                        <li><a href="/category">Categories</a></li> --}}
                        <li class="menu-burger-search"><span>Recherche</span><input type="text" name="search" placeholder="Recherche..." /></li>
                    </ul>
                </nav>
                <nav class="social-networks">
                    <ul>
                        <li><a href="https://www.instagram.com/"><span class="fa-brands fa-instagram"></span></a></li>
                        <li><a href="https://www.facebook.com/"><span class="fa-brands fa-facebook"></span></a></li>
                        <li><a href="https://twitter.com/"><span class="fa-brands fa-twitter"></span></a></li>
                    </ul>
                </nav>
            </div>

            <nav class="social-networks">
                <ul>
                    <li><a href="https://www.instagram.com/"><span class="fa-brands fa-instagram"></span></a></li>
                    <li><a href="https://www.facebook.com/"><span class="fa-brands fa-facebook"></span></a></li>
                    <li><a href="https://twitter.com/"><span class="fa-brands fa-twitter"></span></a></li>
                </ul>
            </nav>
        </header>

        <section class="main-content">
            <div class="main-logo">
                <a href="/"><img src="/images/logo.png" alt="Logo_Wonderin'"></a>
            </div>

            <div class="illustration-login">
                <img src="/images/illustration-login.png" alt="illustration-login" />
                <p class="text1 font-indie-flower">"Un moyen de voyager tout en restant là où vous êtes."</p>
                <p class="text2 font-indie-flower">"L'imagination ne connait aucune limite. Si tu es capable de l'imaginer, c'est qu'il existe d'une certaine façon."</p>
            </div>

            <div class="form-login">
                <h1 class="font-exo-regular">Se connecter à<br/><span>Wonderin'</span></h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-e-mail">
                        <label for="email" class="font-exo-medium">Adresse e-mail :</label>
                        <input id="email" type="email" class="font-exo-regular form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Adresse e-mail" autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-password">
                        <label for="password" class="font-exo-medium">Mot de passe :</label>
                        <input id="password" type="password" class="font-exo-regular form-control @error('password') is-invalid @enderror" name="password" required placeholder="Mot de passe" autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-remember-me">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="font-exo-medium form-check-label" for="remember">
                            Se souvenir de moi
                        </label>
                    </div>
                    <div class="link-sign-up">
                        <p class="font-exo-regular">Vous n'avez pas de compte ? <a href="{{ route('register') }}" class="font-exo-bold">S'inscrire</a></p>
                    </div>
                    <input type="submit" value="Se connecter" class="font-exo-bold">
                </form>
            </div>
        </section>

        <footer class="footer"></footer>

        <!--====== Javascripts & Jquery ======-->
        <script src="/js/jquery-3.6.0.js"></script>
        <!-- <script src="/js/bootstrap.min.js"></script> -->
        <script src="/js/magnific-popup.min.js"></script>
        <script src="/js/divers.js"></script>
    </body>
</html>

{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
