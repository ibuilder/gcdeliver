<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function dailyReports(): HasMany
    {
        return $this->hasMany(DailyReport::class);
    }
    
    public function deliveries(): HasMany 
    { 
        return $this->hasMany(Delivery::class); 
    }

     public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

   public function users(): BelongsToMany
    { 
        return $this->belongsToMany(User::class); 
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}
