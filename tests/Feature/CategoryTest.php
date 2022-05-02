<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_category_index()
    {
        $response = $this->get(route('category.index'));

        $response->assertStatus(200);
    }

    public function test_can_insert_categories() {

        $response = $this->post(route('category.store'), [
            'pos_category' => $this->faker->word,
        ]);

        $response->assertRedirect(route('category.index'));

    }
}
