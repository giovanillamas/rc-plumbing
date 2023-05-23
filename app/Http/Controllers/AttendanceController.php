<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendace;
use App\Models\Incidence;
use App\Models\Project;
use App\Models\User;

class AttendanceController extends Controller
{
    public function index(){
        $attendances = Attendace::all();
        return view('pages.attendances.index', compact('attendances'));
    }

    public function create(){

        $incidences = Incidence::all();
        $users = User::all();
        $projects = Project::all();
        return view('pages.attendances.create', compact('incidences', 'users', 'projects'));

    }

    public function show(Attendace $attendance){
        return view('pages.attendances.show', compact('attendance'));
    }

    public function store(Request $request){

        $request->validate([
            'date_in'=> 'required',
            'time_in'=> 'required',
            'date_out'=> 'required',
            'time_out'=> 'required',
            'incidence_id'=> 'required',
            'user_id'=> 'required',
            'project_id'=> 'required'            
        ]);
        
        $attendance = Attendace::create($request->all());

        return redirect(route('attendances.index', $attendance));

    }

    public function edit(Attendace $attendance){

        $incidences = Incidence::all();
        $users = User::all();
        $projects = Project::all();

        return view('pages.attendances.edit', compact('attendance', 'incidences', 'users', 'projects'));

    }

    public function update(Request $request, Attendace $attendance){
        
        $request->validate([
            'date_in'=> 'required',
            'time_in'=> 'required',
            'date_out'=> 'required',
            'time_out'=> 'required',
            'incidence_id'=> 'required',
            'user_id'=> 'required',
            'project_id'=> 'required'            
        ]);

        $attendance->update($request->all());

        return redirect(route('attendances.index', $attendance));

    }

    public function destroy(Attendace $attendance){

        $attendance->delete();
        return redirect(route('attendances.index'));
    }
}
