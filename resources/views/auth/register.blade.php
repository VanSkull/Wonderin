{{-- @extends('layout.template') --}}

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Inscription - Wonderin'</title>

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
    <body class="page-register">
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
                <a href="/"><img src="/images/logo.png" alt="Logo_Wondering'"></a>
            </div>

            <div class="register-circles-1">
                <div class="circle-1" style="
                display: inline-block;
                width: 496px;
                height: 496px;
                border-radius: 50%;
                border: none;
                background-color: #C2242D;
                "></div>
                <div class="circle-2" style="
                display: inline-block;
                width: 57px;
                height: 57px;
                border-radius: 50%;
                border: 5px solid #901B22;
                background-color: #FFFFFF;
                "></div>
                <div class="circle-3" style="
                display: inline-block;
                width: 166px;
                height: 166px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: #FFFFFF;
                "></div>
            </div>

            <div class="register-circles-2">
                <div class="circle-1" style="
                display: inline-block;
                width: 54px;
                height: 54px;
                border-radius: 50%;
                border: none;
                background-color: #C2242D;
                "></div>
                <div class="circle-2" style="
                display: inline-block;
                width: 115px;
                height: 115px;
                border-radius: 50%;
                border: 10px solid #901B22;
                background-color: #FFFFFF;
                "></div>
            </div>

            <div class="illustration-register">
                <img src="/images/illustration-register.png" alt="illustration-register" />
            </div>

            <div class="form-register">
                <h1 class="font-exo-regular">Rejoignez<br/><span>Wonderin'</span></h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-name">
                        <label for="name" class="font-exo-medium">Nom :</label>
                        <input id="name" type="text" class="font-exo-regular form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Nom" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-pseudo">
                        <label for="pseudo" class="font-exo-medium">Pseudo :</label>
                        <input id="pseudo" type="text" class="font-exo-regular form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') }}" required placeholder="Pseudo" autocomplete="pseudo" autofocus>

                        @error('pseudo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-e-mail">
                        <label for="email" class="font-exo-medium">Adresse e-mail :</label>
                        <input id="email" type="email" class="font-exo-regular form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Adresse e-mail" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-password">
                        <label for="password" class="font-exo-medium">Mot de passe :</label>
                        <input id="password" type="password" class="font-exo-regular form-control @error('password') is-invalid @enderror" name="password" required placeholder="Mot de passe" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-password-confirm">
                        <label for="password-confirm" class="font-exo-medium">Confirmation mot de passe :</label>
                        <input id="password-confirm" type="password" class="font-exo-regular form-control" name="password_confirmation" required placeholder="Confirmation mot de passe" autocomplete="new-password">
                    </div>
                    <input type="submit" value="S'inscrire" class="font-exo-bold">
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
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pseudo" class="col-md-4 col-form-label text-md-end">{{ __('Pseudo') }}</label>

                            <div class="col-md-6">
                                <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') }}" required autocomplete="pseudo" autofocus>

                                @error('pseudo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
