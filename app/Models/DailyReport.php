<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DailyReport extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'project_id',
        'report_date',
        'weather_conditions',
        'notes',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function manpowerEntries(): HasMany
    {
        return $this->hasMany(ManpowerEntry::class);
    }
}

