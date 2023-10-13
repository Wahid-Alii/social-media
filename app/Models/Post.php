<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['description','user_id'];

    public function users()
    {
     return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function likes(){
      return $this->hasMany(Like::class);
    }
    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }
}
