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
    public function test_category_index_exists()
    {
        $response = $this->get(route('category.index'));

        $response->assertStatus(200);
    }

    public function test_can_insert_categories() {

        $response = $this->post(route('category.store'), [
            'pos_category' => $this->faker->word,
            'is_visible' => 1
        ]);

        $response->assertRedirect(route('category.create'));

    }

    public function test_can_update_categories() {

        $category = Category::factory()->create(['pos_category' => 'Fries', 'is_visible' => 1]);

        $response = $this->put(route('category.update', $category->id), [
            'pos_category' => $this->faker->word,
            'is_visible' => 1
        ]);

        $response->assertStatus(302);

        $response->assertRedirect(route('category.edit', $category->id));

    }

    public function test_category_exists_in_database() {

        $category = Category::factory()->create();

        $this->assertModelExists($category);

    }

}
