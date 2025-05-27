<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Content extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'url', 'category_id'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_contents');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'content_genres');
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function getLikesCountAttribute()
    {
        return $this->likedUsers()->count();
    }
}
