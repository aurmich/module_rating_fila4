<?php

namespace Modules\Rating\Tests\Feature;

use Modules\Rating\Tests\TestCase;
use Modules\Rating\Models\Rating;
use Modules\Rating\Models\RatingMorph;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
use Illuminate\Foundation\Testing\WithFaker;

class RatingApiTest extends TestCase
{
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
    use RefreshDatabase, WithFaker;
>>>>>>> origin/develop
>>>>>>> d06edcd (.)

    public function test_can_list_ratings(): void
    {
        Rating::create([
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
            'name' => 'Test Rating 1',
        ]);

        Rating::create([
            'name' => 'Test Rating 2',
<<<<<<< HEAD
=======
=======
            'title' => 'Test Rating 1',
            'value' => 5
        ]);

        Rating::create([
            'title' => 'Test Rating 2',
            'value' => 4
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
        ]);

        $response = $this->getJson('/api/ratings');

        $response->assertStatus(200)
            ->assertJsonCount(2, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
<<<<<<< HEAD
                        'name',
=======
<<<<<<< HEAD
                        'name',
=======
                        'title',
                        'value',
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
                        'created_at',
                        'updated_at'
                    ]
                ]
            ]);
    }

    public function test_can_create_rating(): void
    {
        $data = [
<<<<<<< HEAD
            'name' => 'New Rating',
            'color' => '#00FF00',
=======
<<<<<<< HEAD
            'name' => 'New Rating',
            'color' => '#00FF00',
=======
            'title' => 'New Rating',
            'value' => 5,
            'color' => '#00FF00',
            'icon' => 'star',
            'rule' => 'test',
            'txt' => 'Test description'
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
        ];

        $response = $this->postJson('/api/ratings', $data);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
<<<<<<< HEAD
                    'name' => 'New Rating',
=======
<<<<<<< HEAD
                    'name' => 'New Rating',
=======
                    'title' => 'New Rating',
                    'value' => 5
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
                ]
            ]);
    }

    public function test_can_update_rating(): void
    {
        $rating = Rating::create([
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> d06edcd (.)
            'name' => 'Test Rating',
        ]);

        $data = [
            'name' => 'Updated Rating',
<<<<<<< HEAD
=======
=======
            'title' => 'Test Rating',
            'value' => 5
        ]);

        $data = [
            'title' => 'Updated Rating',
            'value' => 4
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
        ];

        $response = $this->putJson("/api/ratings/{$rating->id}", $data);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
<<<<<<< HEAD
                    'name' => 'Updated Rating',
=======
<<<<<<< HEAD
                    'name' => 'Updated Rating',
=======
                    'title' => 'Updated Rating',
                    'value' => 4
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
                ]
            ]);
    }

    public function test_can_delete_rating(): void
    {
        $rating = Rating::create([
<<<<<<< HEAD
            'name' => 'Test Rating',
=======
<<<<<<< HEAD
            'name' => 'Test Rating',
=======
            'title' => 'Test Rating',
            'value' => 5
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
        ]);

        $response = $this->deleteJson("/api/ratings/{$rating->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('ratings', ['id' => $rating->id]);
    }

    public function test_can_rate_model(): void
    {
        $rating = Rating::create([
<<<<<<< HEAD
            'name' => 'Test Rating',
=======
<<<<<<< HEAD
            'name' => 'Test Rating',
=======
            'title' => 'Test Rating',
            'value' => 5
>>>>>>> origin/develop
>>>>>>> d06edcd (.)
        ]);

        $data = [
            'model_type' => 'test_model',
            'model_id' => 1,
            'value' => 4.5,
            'note' => 'Great!'
        ];

        $response = $this->postJson("/api/ratings/{$rating->id}/rate", $data);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'rating_id' => $rating->id,
                    'value' => 4.5,
                    'note' => 'Great!'
                ]
            ]);
    }
} 