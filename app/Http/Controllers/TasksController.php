<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    public function store(TaskRequest $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Tarea creada exitosamente.');
    }

    public function completed(Task $task)
    {
        $task->update([
            'completed' => "yes"
        ]);

        return redirect()->back()->with('success', 'Tarea marcada como completada.');
    }
}
