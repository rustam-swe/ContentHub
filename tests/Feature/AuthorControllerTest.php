<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Author;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_displays_author_index_page(): void
    {
        $author = Author::factory()->create();

        $response = $this->get('/authors');

        $response->assertStatus(200);
        $response->assertSee($author->name);
    }

    public function test_create_a_new_author()
    {
        $response = $this->post('/authors', [
            'name' => 'New Authors',
            'url' => 'https://example.com',
        ]);

        $this->assertDatabaseHas('authors', [
            'name' => 'New Authors',
            'url' => 'https://example.com',
        ]);

        $response->assertRedirect('/authors');
    }

    public function test_dispays_author_create_page()
    {
        $response = $this->get('/authors/create');

        $response->assertStatus(200);
    }

    public function test_updates_a_author()
    {
        $author = Author::factory()->create([
            'name' => 'Old Name',
            'url' => 'https://old-url.com',
        ]);

        $response = $this->put("/authors/{$author->id}", [
            'name' => 'New Name',
            'url' => 'https://new-url.com',
        ]);

        $response->assertRedirect('/authors');

        $this->assertDatabaseHas('authors', [
            'name' => 'New Name',
            'url' => 'https://new-url.com',
        ]);
    }

    public function test_delete_a_author()
    {
        $author = Author::factory()->create();

        $response = $this->delete("/authors/{$author->id}");

        $response->assertRedirect('/authors');

        $this->assertDatabaseMissing('authors', [
            'id' => $author->id,
        ]);
    }

    public function test_displays_author_show_page()
    {
        $author = Author::factory()->create();

        $response = $this->get("/authors/{$author->id}");

        $response->assertStatus(200);
        $response->assertSee($author->name);
    }
}
