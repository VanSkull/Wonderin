<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'pseudo',
        'email',
        'password',
        'decription',
        'profilImg',
        'bannerImg',
        'country',
        'city',
        'date_of_birth',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function books(){
        return $this->hasMany("App\Models\Book", "idAuteur");
    }
    public function threads(){
        return $this->hasMany("App\Models\Thread", "idAuteur");
    }
    public function ILikeBook(){
        return $this->belongsToMany("App\Models\Book", "book_favorites", "idUser", "idBook");
    }
    public function ILikeThread(){
        return $this->belongsToMany("App\Models\Thread", "thread_likes", "idThread", "idAuteur");
    }
    public function ICommentThread(){
        return $this->belongsToMany("App\Models\Thread", "thread_commentaries", "idThread", "idAuteur");
    }
    public function ILikeCommentBook(){
        return $this->belongsToMany("App\Models\CommentBook", "book_commentary_likes", "idUser", "idCommentaryBook");
    }
    public function IFollowThem(){
        return $this->belongsToMany("App\Models\User", "user_following", "idUser1", "idUser2");
    }
    public function TheyFollowMe(){
        return $this->belongsToMany("App\Models\User", "user_following", "idUser2", "idUser1");
    }
    // public function FollowersCount()
    // {
    //     return count($this->TheyFollowMe);
    // }
}
