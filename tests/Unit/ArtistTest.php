<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Artist;

class ArtistTest extends TestCase
{
    use WithFaker;

    /**
     * test create artist.
     *
     * @return void
     */
    public function test_create_artist()
    {
        $response = $this->json('POST','api/artists',[
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->companyEmail(),
            'mobile' => $this->faker->numberBetween(1000000000,9999999999),
            'brand_name' => $this->faker->company(),
            'genre' => $this->faker->jobTitle(),
            'location' => $this->faker->city()
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
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->companyEmail(),
            'mobile' => $this->faker->numberBetween(1000000000,9999999999),
            'brand_name' => $this->faker->company(),
            'genre' => $this->faker->jobTitle(),
            'location' => $this->faker->city()
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