<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id',
        'name',
        'description',
        'spec_section',
        'lead_time',
        'status',
    ];

    /**
     * Get the project that owns the item.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function deliveries(): BelongsToMany
    {
        return $this->belongsToMany(Delivery::class);
    }
    public function partners(): BelongsToMany
    {
        return $this->belongsToMany(Partner::class);
    }
}
