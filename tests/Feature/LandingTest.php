<?php

namespace Tests\Feature;

use App\Models\Landing;
use Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class LandingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLandingCreation()
    {
        $faker = Faker\Factory::create();
        $name = $faker->name;
        $slug = Str::slug($name);
        $data = [
            'name' => $name,
            'slug' => $slug,
            'description' => $faker->text,
        ];

        $response = $this->actingAs($this->user)->post('/admin/landings/create', $data);

        $response->assertStatus(302);

        $this->assertTrue(Landing::where('slug', $slug)->count() > 0);

        $page_response = $this->get('/page/'.$slug);
        $page_response->assertStatus(200);
    }
}
