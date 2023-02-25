<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;
    protected $table = "threads";

    public function user(){
        return $this->belongsTo("App\Models\User", "idAuteur");
    }
    
    public function like(){
        return $this->belongsToMany("App\Models\User", "thread_likes", "idAuteur", "idThread");
    }
    public function comment(){
        return $this->hasMany("App\Models\CommentThread", 'idThread');
    }
}
