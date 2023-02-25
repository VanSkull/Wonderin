<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use App\Models\BookChapter;
use App\Models\Category;
use App\Models\Thread;
use App\Models\CommentThread;
use App\Models\CommentBook;
// use App\Http\Controllers\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    // Page d'accueil (avec et sans connexion)
    public function index(){
        $bookWeek = Book::findOrFail(1);
        $newBooks = Book::where('state', 'published')
        ->orderBy('id', 'desc')
        ->limit(9)
        ->get();
        $usersFamous = DB::table('users')
        ->select('users.*', DB::raw('COUNT(user_following.idUser2)'))
        ->leftJoin('user_following', 'users.id', '=', 'user_following.idUser2')
        ->groupBy('users.id')
        ->orderByRaw('COUNT(user_following.idUser2) DESC')
        ->limit(9)
        ->get();
        $usersNew = User::orderBy('created_at', 'desc')
        ->limit(9)->get();
        $categoriesFamous = Category::all();
        return view("page.index", ["bookWeek" => $bookWeek, "newBooks" => $newBooks, "usersFamous" => $usersFamous, "usersNew" => $usersNew, "categoriesFamous" => $categoriesFamous]);
    }

    // Page d'accueil (avec connexion)
    /* public function home(){
        return view("page.home");
    } */

    // Page de A propos
    public function about(){
        return view("page.about");
    }

    // Page utilisateur
    public function user($pseudo){
        $user = User::where('pseudo', 'like', $pseudo)->first();
        if($user == false)
            abort(404);
        $userBooks = Book::where('state', 'published')
        ->where('idAuteur', $user->id)
        ->orderBy('name', 'desc')
        ->get();
        $userBooksFavorites = Book::where('state', 'published')
        ->where('idAuteur', $user->id)
        ->orderBy('name', 'desc')
        ->get();
        // $userBooksFavorites = Book::join('book_favorites', 'books.id', '=', 'book_favorites.idBook')
        // ->where('state', 'published')
        // ->where('book_favorites.idUser', $user->id)
        // ->orderBy('name', 'desc')
        // ->get();
        $userThreads = Thread::where('idAuteur', $user->id)
        ->get();
        return view("page.user", ["user" => $user, "userBooks" => $userBooks, "userBooksFavorites" => $userBooksFavorites, "userThreads" => $userThreads]);        
    }
    public function userBook($pseudo){
        $user = User::where('pseudo', 'like', $pseudo)->first();
        if($user == false)
            abort(404);
        $userBookPublished = Book::where('state', 'published')
        ->where('idAuteur', $user->id)
        ->orderBy('name', 'desc')
        ->get();
        $userBookArchived = Book::where('state', 'archived')
        ->where('idAuteur', $user->id)
        ->orderBy('name', 'desc')
        ->get();
        $userBookDraft = Book::where('state', 'draft')
        ->where('idAuteur', $user->id)
        ->orderBy('name', 'desc')
        ->get();
        return view("page.userBook", ["user" => $user, "userBookPublished" => $userBookPublished, "userBookArchived" => $userBookArchived, "userBookDraft" => $userBookDraft]);        
    }
    public function userSettings(){
        // $user = User::findOrFail( Auth::id() );
        return view("page.userSettings");        
        // return view("page.userSettings", ["user" => $user]);        
    }
    public function userUpdate(Request $request){
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'pseudo' => 'required|string|max:255',
            'email' => 'required|email',
            'description' => 'string|max:255|nullable',
            'profilImg' => 'image|nullable',
            'bannerImg' => 'image|nullable',
            'country' => 'string|nullable',
            'city' => 'string|nullable',
            'date_of_birth' => 'date|nullable',
        ]);
        
        if(!empty($request->input("description"))){
            
        }
        if($request->hasFile("profilImg")){
            $nameProfilImg = $request->file("profilImg")->hashName();
            $request->file("profilImg")->move("images/profils/".Auth::id(), $nameProfilImg);
        }
        if($request->hasFile("bannerImg")){
            $nameBannerImg = $request->file("bannerImg")->hashName();
            $request->file("bannerImg")->move("images/banners/".Auth::id(), $nameBannerImg);
        }

        /* DB::update(
            'update users set name = :name, pseudo = :pseudo, email = :email, description = :description, profilImg = :profilImg, bannerImg = :bannerImg, country = :country, city = :city, date_of_birth = :date_of_birth where id = :id', ['name' => $request->input("name"), 'pseudo' => $request->input("pseudo"), 'email' => $request->input("email"), 'description' => $request->input("description"), 'profilImg' => "/images/profils/".Auth::id()."/".$nameProfilImg, 'bannerImg' => "/images/banners/".Auth::id()."/".$nameBannerImg, 'country' => $request->input("country"), 'city' => $request->input("city"), 'date_of_birth' => $request->input("date_of_birth"), 'id' => Auth::id()]
        ); */

        Auth::user()->name = $request->input("name");
        Auth::user()->pseudo = $request->input("pseudo");
        Auth::user()->email = $request->input("email");
        if(!empty($request->input("description"))){
            Auth::user()->description = $request->input("description");
        }
        if($request->hasFile("profilImg")){
            Auth::user()->profilImg = "/images/profils/".Auth::id()."/".$nameProfilImg;
        }
        if($request->hasFile("bannerImg")){
            Auth::user()->bannerImg = "/images/banners/".Auth::id()."/".$nameBannerImg;
        }
        if(!empty($request->input("country"))){
            Auth::user()->country = $request->input("country");
        }
        if(!empty($request->input("city"))){
            Auth::user()->city = $request->input("city");
        }
        if(!empty($request->input("date_of_birth"))){
            Auth::user()->date_of_birth = $request->input("date_of_birth");
        }
        Auth::user()->save();
        
        return redirect("/user/".Auth::user()->pseudo);
    }
    public function userThread($pseudo){
        $user = User::where('pseudo', 'like', $pseudo)->first();
        if($user == false)
            abort(404);
        $threads = Thread::where('idAuteur', $user->id)->get();
        $commentsThread = CommentThread::all();
        return view("page.userThread", ["user" => $user, "threads" => $threads, "commentsThread" => $commentsThread]);        
    }
    public function newThread(Request $request){
        $validate = $request->validate([
            'thread' => 'required|min:1|max:255',
        ]);

        $t = new Thread();
        $t->content = $request->input("thread");      
        $t->idAuteur = Auth::id();
        $t->save();

        return back();        
    }
    public function userFollowing($pseudo){
        $user = User::where('pseudo', 'like', $pseudo)->first();
        if($user == false)
            abort(404);
        return view("page.userFollowing", ["user" => $user]);        
    }

    public function followUser($id){
        User::findOrFail($id);

        Auth::user()->IFollowThem()->toggle($id);
        return back();  
    }
    public function likeThread($id){
        Thread::findOrFail($id);

        Auth::user()->ILikeThread()->toggle($id);
        return back();  
    }
    public function likeBook($id){
        Book::findOrFail($id);

        Auth::user()->ILikeBook()->toggle($id);
        return back();  
    }
    public function likeCommentBook($id){
        CommentBook::findOrFail($id);

        Auth::user()->ILikeCommentBook()->toggle($id);
        return back();  
    }
    public function commentThread(Request $request, $id){
        $validate = $request->validate([
            'comment' => 'required|min:1|max:255',
        ]);

        $t = new CommentThread();
        $t->idAuteur = Auth::id();
        $t->idThread = $id;
        $t->content = $request->input("comment");      
        $t->save();

        return back();  
    }
    public function commentBook(Request $request, $id){
        $validate = $request->validate([
            'comment' => 'required|min:1|max:255',
        ]);

        $t = new CommentBook();
        $t->idBook = $id;
        $t->idAuteur = Auth::id();
        $t->content = $request->input("comment");      
        $t->save();

        return back();  
    }

    // Page de visualisation des livres (présentation puis lecture avec chapitres)
    public function bookAll(){
        $books = Book::where('state', 'published')->orderBy('name', 'desc')->get();
        // dd($books);
        return view("page.bookAll", ["books" => $books]);
    }
    public function bookPreview($id){
        $book = Book::findOrFail($id);
        return view("page.bookPreview", ["book" => $book]);
    }
    public function book($id, $nbChapter){
        $book = Book::findOrFail($id);
        $chapter = BookChapter::where('idBook', $id)->where('numChapter', $nbChapter)->first();
        // dd($chapter);
        return view("page.bookRead", ["book" => $book, "chapter" => $chapter]);
    }

    // Page de création des livres (présentation puis chapitres séparément)
    public function createNewBook(){
        $b = new Book();
        $b->name = "New book from ".Auth::user()->pseudo;      
        $b->idAuteur = Auth::id();      
        $b->imageCouverture = "/images/books/default-book.png";      
        $b->idCategorie = "1";
        $b->state = "draft";
        $b->save();
        
        return redirect("/edit-book/" . $b->id);
    }
    public function editBookPreview($id){
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view("page.editBookPreview", ["book" => $book, "categories" => $categories]);
    }
    public function updateBookPreview(Request $request){
        
        $validate = $request->validate([
            'name' => 'required|string|min:1|max:191',
            'imageCouverture' => 'image|nullable',
            'category' => 'required|numeric',
            'state' => 'required|string',
            'idBook' => 'required|numeric',
        ]);
        
        if($request->hasFile('imageCouverture')){
            $nameImageCover = $request->file("imageCouverture")->hashName();
            $request->file("imageCouverture")->move("images/books/".Auth::id(), $nameImageCover);
            $urlImageCover = "/images/books/".Auth::id()."/".$nameImageCover; 
        }else{
            $urlImageCover = null; 
        }
        
        // dd($request->all());
        // dd($_FILES, $request->file('imageCouverture'));

        $b = Book::findOrFail($request->input("idBook"));

        $b->name = $request->input("name");
        if(!is_null($urlImageCover)){
            $b->imageCouverture = $urlImageCover; 
        }
        $b->idCategorie = $request->input("category");
        $b->state = $request->input("state");
        $b->save();

        // Si le livre vient d'être créé et donc ne possède aucun chapitre
        if($b->chapters()->count() == 0){
            $c = new BookChapter();
            $c->numChapter = 1;      
            $c->title = "Nouveau chapitre";      
            $c->content = "Un nouveau chapitre s'ouvre";      
            $c->idBook = $b->id;
            $c->save();
        }else{
            $c = BookChapter::where('idBook', $b->id)->where('numChapter', 1)->first();
        }
        
        return redirect("/edit-book/".$b->id."/1");
    }
    public function createNewBookChapter(Request $request){
        $validate = $request->validate([
            'idBook' => 'required|numeric',
            'numChapters' => 'required|numeric',
        ]);

        $idBook = $request->input("idBook");
        $chapterNum = $request->input("numChapters") + 1;
        
        // dd($chapterNum);

        $c = new BookChapter();
        $c->numChapter = $chapterNum;      
        $c->title = "Nouveau chapitre";      
        $c->content = "Un nouveau chapitre s'ouvre";      
        $c->idBook = $idBook;
        $c->save();
        
        return redirect("/edit-book/".$idBook."/".$chapterNum);
    }
    public function editBookChapter($id, $nbChapter){
        $book = Book::findOrFail($id);
        $chapter = BookChapter::where('idBook', $id)->where('numChapter', $nbChapter)->first();
        // dd($chapter);
        return view("page.editBookChapter", ["book" => $book, "chapter" => $chapter]);
    }
    public function updateBookChapter(Request $request){
        
        $validate = $request->validate([
            'title' => 'required|string|min:1|max:191',
            'content' => 'required|string|min:1',
            'idBook' => 'required|numeric',
            'idBookChapter' => 'required|numeric',
            'numChapter' => 'required|numeric',
        ]);

        // dd($request->all());

        $chapter = BookChapter::findOrFail($request->input("idBookChapter"));

        $chapter->title = $request->input("title");
        $chapter->content = $request->input("content");
        $chapter->save();
        
        return redirect("/edit-book/" .$request->input("idBook") . "/" . $request->input("numChapter"));
    }

    // Page de recherche
    public function search($search){
        $users = User::whereRaw('name like CONCAT("%",?,"%") OR pseudo like CONCAT("%",?,"%")', [$search, $search])
        ->orderBy('id', 'desc')
        ->get();

        $books = Book::whereRaw('name like CONCAT("%",?,"%") AND state = ?', [$search, "published"])
        ->orderBy('id', 'desc')
        ->get();

        $categories = Category::whereRaw('name like CONCAT("%",?,"%")', [$search])
        ->orderBy('id', 'desc')
        ->get();

        return view("page.search", ["users" => $users, "books" => $books, "categories" => $categories, "search" => $search]);        
    }

    // Page des catégories
    public function categoryAll(){
        $allCategories = Category::all();
        return view("page.categoryAll", ["allCategories" => $allCategories]);
    }

    public function categorySingle($name){
        $category = Category::whereRaw('name like CONCAT("%",?,"%")', [$name])->first();
        $books = Book::where('idCategorie', $category->id)
        ->get();
        return view("page.categorySingle", ["category" => $category, "books" => $books]);
    }
}
