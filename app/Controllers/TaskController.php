<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(): void
    {
        $this->view('tasks/index', ['tasks' => Task::all()]);
    }

    public function edit(string $id): void
    {
        echo "Editando la tarea #{$id}";
    }
}