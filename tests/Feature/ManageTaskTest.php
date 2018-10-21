<?php

namespace Tests\Feature;

use App\Task;
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

    /** @test */
    public function user_can_delete_existing_task()
    {
        $task = new Task;
        $task->name = 'Task to be deleted';
        $task->save();

        $this->assertDatabaseHas('tasks', [
            'name' => 'Task to be deleted',
        ]);

        $response = $this->delete("/task/{$task->id}");

        $response->assertRedirect('/');

        $this->assertDatabaseMissing('tasks', [
            'id'   => $task->id,
            'name' => 'Task to be deleted',
        ]);
    }
}
