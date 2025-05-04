<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'task_name',
        'start_date',
        'end_date',
        'duration',
        'progress',
        'project_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function dependencies()
    {
        return $this->belongsToMany(Schedule::class, 'activity_dependencies', 'schedule_id', 'dependency_id')
            ->withTimestamps();
    }
    
    public function dependants()
    {
        return $this->belongsToMany(Schedule::class, 'activity_dependencies', 'dependency_id', 'schedule_id')
            ->withTimestamps();
    }
}

