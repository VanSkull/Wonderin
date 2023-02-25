<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";

    public function auteur(){
        return $this->belongsTo("App\Models\User", "idAuteur");
    }
    public function category(){
        return $this->belongsTo("App\Models\Category", "idCategorie");
    }
    public function comments(){
        return $this->hasMany("App\Models\CommentBook", 'idBook');
    }
    public function chapters(){
        return $this->hasMany("App\Models\BookChapter", 'idBook');
    }
    public function like(){
        return $this->belongsToMany("App\Models\User", "book_favorites", "idBook", "idUser");
    }
}
