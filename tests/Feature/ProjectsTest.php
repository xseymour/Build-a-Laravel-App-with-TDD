<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase; //RefreshDatabase will reset database back to initial state once tests complete (runs migrations)

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling(); //Allows us to see the exception, as laravel by default catches and handles exceptions gracefully
        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];
        $this->post('projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }
}
