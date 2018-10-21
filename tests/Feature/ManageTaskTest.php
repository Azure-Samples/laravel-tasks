<?php

namespace Tests\Feature;

use App\Task;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ManageTaskTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_see_list_of_tasks()
    {
        $task = $this->createTask('New task item');

        $response = $this->get('/');
        $response->assertSeeText('New task item');
    }

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
        $task = $this->createTask('Task to be deleted');

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

    private function createTask($name = 'New Task')
    {
        $task = new Task;
        $task->name = $name;
        $task->save();

        return $task;
    }
}
