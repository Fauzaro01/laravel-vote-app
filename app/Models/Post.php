<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'title', 'content', 'user_id'
    ];

    public function votes()
{
    return $this->hasMany(Vote::class, 'post_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
}
