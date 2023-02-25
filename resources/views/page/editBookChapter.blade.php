@extends('layout.template')

@section('content')
    <div class="page-edit-book-chapter">
        <section class="section-entete">
            <h2>Écriture d'un chapitre de book</h2>
        </section>

        
        @auth
            @if(Auth::user()->id == $book->idAuteur)
                <section class="section-preview-book">
                    <div class="container">
                        <div class="presentation-book">
                            <div class="image-book">
                                <img src="{{ $book->imageCouverture }}" alt="Couverture_book_{{ $book->name }}">
                            </div>
                            <div class="text-book">
                                <h2>Titre : {{ $book->name }}</h2>
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
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endauth

        <section class="main-content">
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
                        <form>
                            <select name="ListChapters" size=1 onChange="ChangeChapter(this.form)"  >
                                <option selected value="">--Liste des chapitres--</option>
                                @for ($i = 1; $i <= $book->chapters()->count(); $i++)
                                    <option value="{{ $i }}" @if($chapter->numChapter == $i) selected @endif>Chapitre {{ $i }}</option>
                                @endfor
                            </select>
                        </form>
                        
                        <div class="edit-chapter">
                            <form action="/update-book/chapter" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="field-chapter-title">
                                    <label for="title">Titre du chapitre :</label>
                                    <input type="text" name="title" placeholder="Titre du chapitre" value="{{ $chapter->title }}" required />
                                </div>
                                <div class="field-chapter-content">
                                    <label for="content">Contenu :</label>
                                    <textarea id="contentWYSIWYG" name="content" cols="50" rows="30" placeholder="Écrivez ici..." required>{!! $chapter->content !!}</textarea>
                                </div>
                                <input type="hidden" name="idBook" value="{{ $book->id }}" />
                                <input type="hidden" name="idBookChapter" value="{{ $chapter->id }}" />
                                <input type="hidden" name="numChapter" value="{{ $chapter->numChapter }}" />
                                <p>
                                    <input type="submit" value="Valider">
                                </p>
                            </form>
                            <form action="/new-chapter-book" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="idBook" value="{{ $book->id }}" />
                                <input type="hidden" name="numChapters" value="{{ $book->chapters()->count() }}" />
                                <input type="submit" value="Créer un nouveau chapitre" />
                            </form>
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

    <script language="JavaScript">
        function ChangeChapter(formulaire){
            if(formulaire.ListChapters.selectedIndex != 0){
                var url = "/edit-book/{{ $book->id }}/" + formulaire.ListChapters.options[formulaire.ListChapters.selectedIndex].value;
                // console.log(url);
                window.location.href = url;
            }
        }

        tinymce.init({
            selector: '#contentWYSIWYG',
            plugins: [
            'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
            'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
            'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
            ],
            toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
            'alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
    </script>
@endsection