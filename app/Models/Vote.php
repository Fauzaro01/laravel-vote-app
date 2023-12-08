<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'votes';
    protected $primaryKey = 'id';
    protected $keyType = "string";
    protected $increment = false;
    public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'value', 'post_id'
    ];

    public function posts () {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
