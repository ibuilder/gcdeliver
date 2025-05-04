<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ActivityDependency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DailyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'id',
        'date',
        'weather_conditions',
        'notes',
        'manpower_information',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function manpowerEntries(): HasMany
    {
        return $this->hasMany(ManpowerEntry::class);
    }

    public function activityDependencies(): HasMany
    {
        return $this->hasMany(ActivityDependency::class);
    }
}