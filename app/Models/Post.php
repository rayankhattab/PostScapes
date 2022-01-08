<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'body'
    ];
    public function likedBy(User $user){
        return $this->likes->contains('user_id',$user->id);
        //returns true or false in the case of the authenticated user has already liked the post or not
        //contains is a laravel collection method that looks into object collection
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
}