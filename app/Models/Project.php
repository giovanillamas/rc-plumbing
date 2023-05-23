<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start',
        'finish',
        'status',
        'phase_id',
    ];

    public function phase(){

        return $this->belongsTo('App\Models\Phase');

    }
}
