<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Enums\Priority;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    public function index(Request $request) {
        // We could use with to get project relashionship
        // But since we've to filter tasks by project_id
        // It's changed to query builder with join on projects table
        // $tasks = Task::with('project')->orderBy('priority', 'ASC');

        $tasks = Task::select('projects.id as project_id', 'tasks.*')
            ->join('projects', 'tasks.project_id', 'projects.id')
            ->orderBy('priority', 'ASC');
        if ($request->get('project_id')) {
            $tasks = $tasks->where('project_id', $request->get('project_id'));
        }
        $tasks = $tasks->paginate(5);
        $projects = Project::all();

        return view('tasks.index', compact('tasks', 'projects'));
    }

    public function create() {
        $projects = Project::all();
        $priorities = array_column(Priority::cases(), 'value');

        return view('tasks.create', compact('projects', 'priorities'));
    }

    public function store(StoreTaskRequest $request) {
        $data = [
            'name' => $request->post('name'),
            'priority' => $request->post('priority'),
            'project_id' => $request->post('project_id')
        ];
        Task::create($data);
        
        return redirect()->route('tasks.index');
    }

    public function edit($id) {
        $task = Task::find($id);
        $projects = Project::all();
        $priorities = array_column(Priority::cases(), 'value');

        return view('tasks.edit', compact('task', 'projects', 'priorities'));
    }

    public function update(StoreTaskRequest $request, $id) {
        $data = [
            'name' => $request->post('name'),
            'priority' => $request->post('priority'),
            'project_id' => $request->post('project_id')
        ];
        Task::where('id', $id)->update($data);
        
        return redirect()->route('tasks.index');
    }

    public function destroy($id) {
        Task::where('id', $id)->delete();

        return redirect()->route('tasks.index');
    }
}
