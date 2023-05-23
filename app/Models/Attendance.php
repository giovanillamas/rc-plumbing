<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_in',
        'time_in',
        'date_out',
        'time_out',
        'incidence_id',
        'user_id',
        'project_id',
        'phase',
    ];

    public function incidence(){

        return $this->belongsTo('App\Models\Incidence');

    }

    public function user(){

        return $this->belongsTo('App\Models\User');

    }

    public function project(){

        return $this->belongsTo('App\Models\Project');

    }
}
