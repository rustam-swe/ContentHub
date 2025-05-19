<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Genre;

class GenreControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_displays_genre_index_page()
    {
        $genre = Genre::factory()->create();

        $response = $this->get('/genres');

        $response->assertStatus(200);
        $response->assertSee($genre->name);
    }

    public function test_create_a_new_genre()
    {
        $response = $this->post('/genres', [
            'name' => 'New Genre',
        ]);

        $this->assertDatabaseHas('genres', [
            'name' => 'New Genre',
        ]);

        $response->assertRedirect('/genres');
    }

    public function test_displays_genre_create_page()
    {
        $response = $this->get('/genres/create');

        $response->assertStatus(200);
    }

    public function test_updates_a_genre()
    {
        $genre = Genre::factory()->create(['name' => 'Old Name']);

        $response = $this->put("/genres/{$genre->id}", [
            'name' => 'New Name'
        ]);

        $response->assertRedirect('/genres');
        $this->assertDatabaseHas('genres', ['name' => 'New Name']);
    }

    public function test_delete_a_genre()
    {
        $genre = Genre::factory()->create();

        $response = $this->delete("/genres/{$genre->id}");

        $response->assertRedirect('/genres');
        $this->assertDatabaseMissing('genres', ['id' => $genre->id]);
    }

    public function test_displays_genre_show_page()
    {
        $genre = Genre::factory()->create();

        $response = $this->get("/genres/{$genre->id}");

        $response->assertStatus(200);
        $response->assertSee($genre->name);
    }
}
