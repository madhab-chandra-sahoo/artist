<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Artist;

class ArtistTest extends TestCase
{
    /**
     * test create artist.
     *
     * @return void
     */
    public function test_create_artist()
    {
        $response = $this->json('POST','api/artists',[
            'name' => 'Test artist',
            'email' => 'test-email3@yopmail.com',
            'mobile' => '1231231222',
            'brand_name' => 'test-brand',
            'genre' => 'test-genre',
            'location' => 'test-location'
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test update artist.
     *
     * @return void
     */
    public function test_update_artist()
    {
        $response = $this->json('PUT','api/artists/5',[
            'name' => 'Test artist',
            'email' => 'test-email2@yopmail.com',
            'mobile' => '9630258741',
            'brand_name' => 'test-brand',
            'genre' => 'test-genre',
            'location' => 'test-location'
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find artist.
     *
     * @return void
     */
    public function test_find_artist()
    {
        $response = $this->json('GET','api/artists/2');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test get all artists.
     *
     * @return void
     */
    public function test_get_all_artist()
    {
        $response = $this->json('GET','api/artists');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }
}