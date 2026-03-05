<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $q = Project::query()
            ->withCount(['tasks' => fn($t) => $t->whereNull('deleted_at')])
            ->orderByDesc('id');

        if ($request->filled('search')) {
            $q->where('name', 'ilike', '%'.$request->string('search').'%');
        }
        if ($request->filled('status')) {
            $q->where('status', $request->string('status'));
        }

        return $q->paginate(10);
    }

    public function store(ProjectRequest $request)
    {
        $project = Project::create([
            'created_by' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status ?? 'active',
        ]);

        return response()->json($project, 201);
    }

    public function show(Project $project)
    {
        $project->load([
            'tasks' => function ($q) {
                $q->whereNull('deleted_at')->with('category')->orderByDesc('id');
            }
        ]);

        // group tasks by category name for kanban
        $grouped = $project->tasks->groupBy(fn($t) => $t->category->name);

        return response()->json([
            'project' => $project->only(['id','name','description','status','created_by','created_at','updated_at']),
            'tasks_by_category' => $grouped,
        ]);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return response()->json($project);
    }
}
