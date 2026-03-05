<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $q = Task::query()
            ->whereNull('deleted_at')
            ->with(['project:id,name','category:id,name'])
            ->orderByDesc('id');

        if ($request->filled('search')) {
            $q->where('title', 'ilike', '%'.$request->string('search').'%');
        }
        if ($request->filled('project_id')) {
            $q->where('project_id', (int)$request->project_id);
        }
        if ($request->filled('category_id')) {
            $q->where('category_id', (int)$request->category_id);
        }

        return $q->paginate(10);
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create([
            ...$request->validated(),
            'created_by' => $request->user()->id,
        ]);

        return response()->json($task->load(['project:id,name','category:id,name']), 201);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return response()->json($task->load(['project:id,name','category:id,name']));
    }

    public function move(MoveTaskRequest $request, Task $task)
    {
        $task->update(['category_id' => $request->category_id]);
        return response()->json($task->load(['category:id,name']));
    }

    public function destroy(Request $request, Task $task)
    {
        $task->deleted_by = $request->user()->id;
        $task->save();
        $task->delete();

        return response()->json(['message' => 'Task dihapus (soft delete)']);
    }
}
