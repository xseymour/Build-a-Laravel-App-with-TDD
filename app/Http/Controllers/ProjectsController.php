<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * @param Project $project (Route Model Binding)
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store()
    {
        //validate
        $attributes = $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
        ]);
        //persist
        auth()->user()->projects()->create($attributes);
        //redirect
        return redirect('/projects');
    }
}
