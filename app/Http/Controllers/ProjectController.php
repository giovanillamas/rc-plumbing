<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Phase;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('pages.projects.index', compact('projects'));
    }

    public function create(){

        $phases = Phase::all();
        return view('pages.projects.create', compact('phases'));

    }

    public function show(Project $project){
        return view('pages.projects.show', compact('project'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'status' => 'required',
            'phase_id' => 'required'
        ]);
        
        $project = Project::create($request->all());

        return redirect(route('projects.index', $project));

    }

    public function edit(Project $project){

        $phases = Phase::all();

        return view('pages.projects.edit', compact('project', 'phases'));

    }

    public function update(Request $request, Project $project){
        $request->validate([
            'name' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'status' => 'required',
            'phase_id' => 'required'
        ]);

        $project->update($request->all());

        return redirect(route('projects.index', $project));

    }

    public function destroy(Project $project){

        $project->delete();
        return redirect(route('projects.index'));
    }
}
