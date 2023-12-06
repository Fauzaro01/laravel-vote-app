<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'Vote';
    protected $primaryKey = 'id';
    protected $timestamps = false;
    protected $fillable = [
        'id', 'name', 'value', 'post_id'
    ];

    public function posts () {
        return $this->belongsTo(Post::class);
    }
}
