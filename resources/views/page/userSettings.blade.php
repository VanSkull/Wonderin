@extends('layout.template')

@section('content')
<div class="page-user-settings">
    <section class="section-entete">
        <h2>Mise à jour du profil : {{ Auth::user()->name }}</h2>
    </section>
    <!-- page section start -->
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
            <form method="POST" action="/user/update" enctype="multipart/form-data">
                @csrf
                <div class="main-form">
                    <div class="field-name">
                        <label for="name">Nom :</label>
                        <input type="text" placeholder="Nom" name="name" value="{{ Auth::user()->name }}" required />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="field-pseudo">
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" placeholder="Pseudo" name="pseudo" value="{{ Auth::user()->pseudo }}" required />
                        @error('pseudo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="field-email">
                        <label for="email">Adresse e-mail :</label>
                        <input type="email" placeholder="Adresse e-mail" name="email" value="{{ Auth::user()->email }}" required />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="field-description">
                        <label for="description">Description :</label>
                        <textarea name="description" placeholder="Décris-toi ici..." cols="30" rows="10">{{ Auth::user()->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="field-profil-image">
                        <label for="profilImg">Image de profil :</label>
                        <div>
                            <input type="file" name="profilImg" />
                            <img class="profilImg_preview" src="{{ Auth::user()->profilImg }}" alt="Preview image de profil">
                        </div>
                        @error('profilImg')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="field-banner-image">
                        <label for="bannerImg">Image de bannière :</label>
                        <div>
                            <input type="file" name="bannerImg" />
                            <img class="bannerImg_preview" src="{{ Auth::user()->bannerImg }}" alt="Preview image de bannière">
                        </div>
                        @error('bannerImg')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="field-country">
                        <label for="country">Pays :</label>
                        <input type="text" name="country" placeholder="Pays" value="{{ Auth::user()->country }}" />
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="field-city">
                        <label for="city">Ville :</label>
                        <input type="text" name="city" placeholder="Ville" value="{{ Auth::user()->city }}" />
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="field-date-of-birth">
                        <label for="date_of_birth">Date de naissance :</label>
                        <input type="date" name="date_of_birth" value="{{ Auth::user()->date_of_birth }}" />
                        @error('date_of_birth')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <input type="submit" value="Mettre à jour" />
                </div>
            </form>
        </div>
    </section>
</div>
@endsection