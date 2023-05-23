<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidence;

class IncidenceController extends Controller
{
    public function index(){
        $incidences = Incidence::all();
        return view('pages.incidences.index', compact('incidences'));
    }

    public function create(){

        return view('pages.incidences.create');

    }

    public function show(Incidence $incidence){
        return view('pages.incidences.show', compact('incidence'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);
        
        $incidence = Incidence::create($request->all());

        return redirect(route('incidences.index'));

    }

    public function edit(Incidence $incidence){

        $incidences = Incidence::all();

        return view('pages.incidences.edit', compact('incidence', 'incidences'));

    }

    public function update(Request $request, Incidence $incidence){
        $request->validate([
            'name' => 'required'
        ]);

        $incidence->update($request->all());

        return redirect(route('incidences.index'));

    }

    public function destroy(Incidence $incidence){

        $incidence->delete();
        return redirect(route('incidences.index'));
    }
}
