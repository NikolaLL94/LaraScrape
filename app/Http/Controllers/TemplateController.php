<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateStoreRequest;
use App\Http\Resources\TemplateCollection;
use App\Http\Resources\TemplateResource;
use App\Models\Project;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TemplateCollection
     */
    public function index()
    {
        return view('template.index', [
            'templates' => TemplateResource::collection(
                Template::paginate(15)
            )
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Template $template
     * @return \App\Http\Resources\TemplateResource
     */
    public function show(Request $request, Template $template)
    {
        return new TemplateResource($template);

        $template = Template::find($id);

        return view('template.show', compact('template'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('template.create');
    }

    /**
     * @param \App\Http\Requests\TemplateStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TemplateStoreRequest $request)
    {
        $template = Template::create($request->validated());

        $request->session()->flash('template.name', $template->name);

        return redirect()->route('template.index')
            ->with('success', 'Template has been created successfully.');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Template $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Template $template)
    {
        $project = Project::find($id);

        return view('template.edit', compact('template'));
    }
}
