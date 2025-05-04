<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'start_date',
        'end_date',
        'project_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function dependencies()
    {
        return $this->belongsToMany(Schedule::class, 'activity_dependencies', 'schedule_id', 'dependency_id');
    }
}

