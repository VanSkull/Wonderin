<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Page d'accueil (avec et sans connexion)
Route::get('/', [MainController::class, 'index']);
Route::get('/home', [MainController::class, 'index']);

// Page d'accueil (avec connexion)
// Route::get('/home', [MainController::class, 'home'])->middleware('auth');

// Page de A propos
Route::get('/about', [MainController::class, 'about']);

// Page de connexion et d'inscription
Auth::routes();

// Page utilisateur
Route::get('/user/settings', [MainController::class, 'userSettings'])->middleware('auth');
Route::post('/user/update', [MainController::class, 'userUpdate'])->middleware('auth');
Route::get('/user/{pseudo}', [MainController::class, 'user']);
Route::get('/user/{pseudo}/book', [MainController::class, 'userBook']);
Route::get('/user/{pseudo}/thread', [MainController::class, 'userThread']);
Route::post('/new/thread', [MainController::class, 'newThread'])->middleware('auth');
Route::get('/user/{pseudo}/following', [MainController::class, 'userFollowing']);
Route::post('/create/book', [MainController::class, 'createBook'])->middleware('auth');

Route::post('/follow-user/{id}', [MainController::class, 'followUser'])->where('id', '[0-9]+')->middleware('auth');
Route::post('/like-thread/{id}', [MainController::class, 'likeThread'])->where('id', '[0-9]+')->middleware('auth');
Route::post('/comment-thread/{id}', [MainController::class, 'commentThread'])->where('id', '[0-9]+')->middleware('auth');
Route::get('/like-book/{id}', [MainController::class, 'likeBook'])->where('id', '[0-9]+')->middleware('auth');
Route::post('/comment-book/{id}', [MainController::class, 'commentBook'])->where('id', '[0-9]+')->middleware('auth');
Route::get('/like-comment-book/{id}', [MainController::class, 'likeCommentBook'])->where('id', '[0-9]+')->middleware('auth');

// Page de visualisation des livres (présentation puis lecture avec chapitres)
Route::get('/book', [MainController::class, 'bookAll']);
Route::get('/book/{id}', [MainController::class, 'bookPreview'])->where('id', '[0-9]+');
Route::get('/book/{id}/{chapter}', [MainController::class, 'book'])->where('id', '[0-9]+')->where('chapter', '[0-9]+');;

// Page de création des livres (présentation puis chapitres séparément)
Route::get('/create-new-book', [MainController::class, 'createNewBook'])->middleware('auth');
Route::get('/edit-book/{id}', [MainController::class, 'editBookPreview'])->where('id', '[0-9]+')->middleware('auth');
Route::post('/update-book/preview', [MainController::class, 'updateBookPreview'])->middleware('auth');
Route::get('/edit-book/{id}/{chapter}', [MainController::class, 'editBookChapter'])->where('id', '[0-9]+')->where('chapter', '[0-9]+')->middleware('auth');
Route::post('/update-book/chapter', [MainController::class, 'updateBookChapter'])->middleware('auth');
Route::post('/new-chapter-book', [MainController::class, 'createNewBookChapter'])->middleware('auth');

// Page de recherche
Route::get('/search/{regex}', [MainController::class, 'search']);

// Page des catégories
Route::get('/category', [MainController::class, 'categoryAll']);
Route::get('/category/{genre}', [MainController::class, 'categorySingle']);