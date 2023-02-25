<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentThread extends Model
{
    use HasFactory;
    protected $table = "thread_commentaries";

    public function user(){
        return $this->belongsTo("App\Models\User", "idAuteur");
    }
    public function thread(){
        return $this->belongsTo("App\Models\Thread", "idThread");
    }
}
