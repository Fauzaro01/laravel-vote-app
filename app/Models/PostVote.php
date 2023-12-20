<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostVote extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'user_id', 'vote_id', 'post_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vote()
    {
        return $this->belongsTo(Vote::class, 'vote_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
