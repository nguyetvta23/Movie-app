<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MoviesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_movie_show_info(): void
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular' => Http::response(['results' => 'foo'], 200),

        ]);
        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
    }
}
