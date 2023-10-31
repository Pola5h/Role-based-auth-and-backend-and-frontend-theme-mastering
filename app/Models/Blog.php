<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function likesCount()
    {
        return $this->hasMany(Like::class, 'blog_id')->selectRaw('count(*) as count')->groupBy('blog_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
