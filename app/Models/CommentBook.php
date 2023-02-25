<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentBook extends Model
{
    use HasFactory;
    protected $table = "book_commentaries";
    
    public function user(){
        return $this->belongsTo("App\Models\User", "idAuteur");
    }
    public function book(){
        return $this->belongsTo("App\Models\Book", "idBook");
    }
    public function like(){
        return $this->belongsToMany("App\Models\User", "book_commentary_likes", "idCommentaryBook", "idUser");
    }
}
