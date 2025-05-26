<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Genre;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        Content::factory(10)->create()->each(function ($content) {
            $authors = Author::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $content->authors()->attach($authors);

            $genres = Genre::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $content->genres()->attach($genres);
        });
    }
}
