<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phase;

class PhaseController extends Controller
{
    public function index(){
        $phases = Phase::all();
        return view('pages.phases.index', compact('phases'));
    }

    public function create(){

        return view('pages.phases.create');

    }

    public function show(Phase $phase){
        return view('pages.phases.show', compact('phase'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);
        
        $phase = Phase::create($request->all());

        return redirect(route('phases.index'));

    }

    public function edit(Phase $phase){

        $phases = Phase::all();

        return view('pages.phases.edit', compact('phase', 'phases'));

    }

    public function update(Request $request, Phase $phase){
        $request->validate([
            'name' => 'required'
        ]);

        $phase->update($request->all());

        return redirect(route('phases.index'));

    }

    public function destroy(Phase $phase){

        $phase->delete();
        return redirect(route('phases.index'));
    }
}
