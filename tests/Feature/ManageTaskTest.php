<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManageTaskTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_add_task()
    {
        $response = $this->post('/task', [
            'name' => 'My new task',
        ]);

        $response->assertRedirect('/');

        $this->assertDatabaseHas('tasks', [
            'name' => 'My new task',
        ]);
    }
}
