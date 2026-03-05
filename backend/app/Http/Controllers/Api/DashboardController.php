<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function summary()
    {
        $activeProjects = Project::where('status', 'active')->count();

        // definisi "unfinished": category != "Done"
        $unfinished = Task::whereNull('deleted_at')
            ->whereHas('category', fn($q) => $q->where('name', '!=', 'Done'))
            ->count();

        $nearDue = Task::whereNull('deleted_at')
            ->whereNotNull('due_date')
            ->whereDate('due_date', '<=', Carbon::now()->addDays(3))
            ->whereHas('category', fn($q) => $q->where('name', '!=', 'Done'))
            ->with(['project:id,name','category:id,name'])
            ->orderBy('due_date')
            ->limit(10)
            ->get();

        return response()->json([
            'active_projects_count' => $activeProjects,
            'unfinished_tasks_count' => $unfinished,
            'near_due_tasks' => $nearDue,
        ]);
    }
}
