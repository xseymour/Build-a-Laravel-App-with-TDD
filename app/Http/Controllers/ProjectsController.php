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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store()
    {
        //validate
        $attributes = $this->validate(request(), ['title' => 'required', 'description' => 'required']);
        //persist
        Project::create( $attributes);
        //redirect
        return redirect('/projects');
    }
}
