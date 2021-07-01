<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Post;

class PostTag extends Model
{
    protected $fillable = ["tag_id","post_id"];

    public function posts()
    {
        return $this->hasOne(Post::class);
    }
}
