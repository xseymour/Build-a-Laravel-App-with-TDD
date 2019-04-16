<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageProjectsTest extends TestCase
{
    use WithFaker, RefreshDatabase; //RefreshDatabase will reset database back to initial state once tests complete (runs migrations)

    /** @test */
    public function guests_cannot_manage_projects()
    {
        $project = factory(Project::class)->create();

        $this->get('/projects')->assertRedirect('login');
        $this->get('/projects/create')->assertRedirect('login');
        $this->get($project->path())->assertRedirect('login');
        $this->post('/projects', $project->toArray())->assertRedirect('login');
    }

    /** @test */
    public function a_user_can_create_a_project()
    {
        $this->withoutExceptionHandling(); //Allows us to see the exception, as laravel by default catches and handles exceptions gracefully
        $this->actingAs(factory(User::class)->create());

        //Create Page Exists
        $this->get('projects/create')->assertStatus(200);

        $attributes = [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];
        $this->post('projects', $attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }
    /** @test */
    public function a_user_can_view_their_project()
    {
        $this->actingAs(factory(User::class)->create());

        /** @var Project $project  */
        $project = factory('App\Project')->create(['owner_id' => auth()->id()]);
        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    /** @test */
    public function an_authenticated_user_cannot_view_the_projects_of_others()
    {
        $this->actingAs(factory(User::class)->create());

        /** @var Project $project  */
        $project = factory('App\Project')->create();
        $this->get($project->path())
            ->assertStatus(403);
    }

    /** @test */
    public function a_project_requires_a_title()
    {
        $this->actingAs(factory(User::class)->create());
        //Use Database Factory (artisan make:factory ProjectFactory --model="App\Project") to generate all attributes except the one the test requires to be missing
        $attributes = factory('App\Project')->raw(['title' => '']);
        $this->post('/projects', $attributes)->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_project_requires_a_description()
    {
        $this->actingAs(factory(User::class)->create());
        $attributes = factory('App\Project')->raw(['description' => '']);
        $this->post('/projects', [])->assertSessionHasErrors('description');
    }
}
