<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'url'];
    public function autors() {
        return $this->hasMany(Content::class);
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'author_contents');
    }

}
