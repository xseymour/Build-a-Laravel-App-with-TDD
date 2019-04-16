<?php

namespace Tests\Unit;

use App\Project;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function it_has_a_path()
    {
        $project = factory('App\Project')->create();
        $this->assertEquals('/projects/'.$project->id, $project->path());
    }

    /** @test */
    function it_has_a_owner()
    {
        $project = factory(Project::class)->create();
        self::assertInstanceOf(User::class, $project->user);
    }
}
