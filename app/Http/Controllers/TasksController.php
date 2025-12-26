<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;

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

    public function completed($id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'completed' => 'yes'
        ]);

        return redirect()->back()->with('success', 'Tarea marcada como completada.');
    }

    public function incomplete($id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'completed' => 'no'
        ]);

        return redirect()->back()->with('success', 'Tarea marcada como incompleta.');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->has('without_due_date') ? null : $request->due_date,
        ]);

        return redirect()->route('home')->with('success', 'Tarea actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Tarea eliminada exitosamente.');
    }

    public function completed_tasks()
    {
        $tasks = Task::where('user_id', Auth::id())->where('completed', 'yes')->get();
        return view('tasks.completed_taks', compact('tasks'));
    }
}
