<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Incidence;
use App\Models\Phase;
use App\Models\Project;
use App\Models\User;

class AttendanceController extends Controller
{
    public function index(){
        $attendances = Attendance::all();
        return view('pages.attendances.index', compact('attendances'));
    }

    public function create(){

        $incidences = Incidence::all();
        $users = User::all();
        $projects = Project::all();
        return view('pages.attendances.create', compact('incidences', 'users', 'projects'));

    }

    public function show(Attendance $attendance){
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
            'project_id'=> 'required',         
        ]);

        $project = Project::find($request->project_id);

        $attendance = Attendance::create([
            'date_in' => $request->date_in,
            'time_in' => $request->time_in,
            'date_out' => $request->date_out,
            'time_out' => $request->time_out,
            'incidence_id' => $request->incidence_id,
            'user_id' => $request->user_id,
            'project_id' => $request->project_id,
            'phase' => $project->phase->name,
        ]);

        return redirect(route('attendances.index', $attendance));

    }

    public function edit(Attendance $attendance){

        $incidences = Incidence::all();
        $users = User::all();
        $projects = Project::all();

        return view('pages.attendances.edit', compact('attendance', 'incidences', 'users', 'projects'));

    }

    public function update(Request $request, Attendance $attendance){
        
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

    public function destroy(Attendance $attendance){

        $attendance->delete();
        return redirect(route('attendances.index'));
    }
}
