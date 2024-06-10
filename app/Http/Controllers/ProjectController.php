<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('project.index', [
            'projects' => ProjectResource::collection(
                Project::paginate(15)
            )
        ]);
    }

    /**
     * @param Project $project
     * @return Application|Factory|View
     */
    public function show(Project $project)
    {
       $project = new ProjectResource($project);

        return view('project.show', compact('project'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * @param ProjectStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = Project::create($request->validated());

        $request->session()->flash('project.name', $project->name);

        return redirect()
            ->route('project.index')
            ->with('success', 'Project has been created successfully.');
    }
}
