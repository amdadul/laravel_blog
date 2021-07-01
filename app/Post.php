<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Post extends Model
{
    protected $fillable = ['category_id','user_id','title','shortdesc','longdesc','thumbimg','image','status','hit','url','is_featured','updated_by'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tags')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['url'] = Str::slug($value);
    }
}
