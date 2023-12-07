<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $keyType = "string";
    protected $increment = false;
    public $timestamps = false;
    protected $fillable = [
        'id', 'title', 'content', 'user_id'
    ];

    public function votes()
{
    return $this->hasMany(Vote::class);
}
}
