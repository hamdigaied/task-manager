<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::paginate(5);

        return view('projects.index', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request) {
        $data = [
            'name' => $request->post('name')
        ];
        Project::create($data);

        return redirect()->route('projects.index');
    }

    public function destroy($id) {
        Project::where('id', $id)->delete();

        return redirect()->route('projects.index');
    }
}
