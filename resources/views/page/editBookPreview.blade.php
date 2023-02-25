@extends('layout.template')

@section('content')
    <div class="page-edit-book-preview">
        <section class="section-entete">            
            <h2>Édition d'un book</h2>
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
                @auth
                    @if(Auth::user()->id == $book->idAuteur)
                        <div class="form-edit-book">
                            <form action="/update-book/preview" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="field-book-title">
                                    <label for="name">Titre du book :</label>
                                    <input type="text" placeholder="Titre du book" name="name" value="{{ $book->name }}" required />
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="field-book-couverture-image">
                                    <label for="imageCouverture">Couverture du book :</label>
                                    <div>
                                        <input type="file" name="imageCouverture" />
                                        <img class="imageCouverture_preview" src="{{ $book->imageCouverture }}" alt="Preview image de couverture du book">
                                    </div>
                                    @error('imageCouverture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="field-book-category">
                                    <label for="category">Catégorie du book :</label>
                                    <select name="category" required>
                                        <option value="">--Choisie une catégorie--</option>
                                        @foreach ($categories as $c)
                                        <option value="{{ $c->id }}" @if($c->id == $book->idCategorie) selected @endif>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="field-book-state">
                                    <label for="state">État du book :</label>
                                    <select name="state" required>
                                        <option value="draft" @if($book->state == "draft" || empty($book->state)) selected @endif>Brouillon</option>
                                        <option value="published" @if($book->state == "published") selected @endif>Publié</option>
                                        <option value="archived" @if($book->state == "archived") selected @endif>Archivé</option>
                                    </select>
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <input type="hidden" name="idBook" value="{{$book->id}}" required />
                                <p>
                                    <input type="submit" value="Valider">
                                    @if ($book->chapters()->count() > 0) 
                                        <a href="/edit-book/{{ $book->id }}/1" class="link-edit-book-chapter" title="Modifier le book">Éditer les chapitres</a>
                                    @endif
                                </p>
                            </form>
                        </div>
                        <div class="presentation-book">
                            <h2>Titre : "{{ $book->name }}"</h2>
                            <p><strong>État</strong> : @if($book->state == "draft")
                                Brouillon
                            @elseif($book->state == "published")
                                Publié
                            @elseif($book->state == "archived")
                                Archivé
                            @endif</p>
                            <p><strong>Auteur</strong> : {{ $book->auteur->pseudo }}</p>
                            <p><strong>Catégorie</strong> : @if(empty($book->idCategorie)) <span>Aucune categorie</span> @else <a href="/category/{{ strtolower($book->category->name) }}">{{ $book->category->name }}</a> @endif </p>
                            <p><strong>Nombre de chapitre</strong> : {{ $book->chapters()->count() }}</p>
                            <p><strong>Couverture du book</strong> : </p>
                            <img src="{{ $book->imageCouverture }}" alt="Couverture_book_{{ $book->name }}">
                        </div>
                    @else
                        <div class="message-alert">
                            <h2>Modification de book non autorisé</h2>
                            <p>Il semblerait que vous essayez de modifier un book dont vous n'êtes pas l'auteur.<br/>Sachez que la modification de données personnelles est immorale et illégale.<br/>Si vous voulez modifier un book, merci de vouloir modifier uniquement les books qu'ils vous appartiennent sur <a href="/user/{{ Auth::user()->Pseudo }}/book">votre page</a>.</p>
                            <p><a href="/" class="btn">Retour à l'accueil</a></p>
                        </div>
                    @endif
                @endauth
            </div>
        </section>
    </div>
@endsection