<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url'];
    public function autors() {
        return $this->hasMany(Content::class);
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class, 'author_contents');
    }

}
