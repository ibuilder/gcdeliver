<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'date',
        'unload_duration',
        'location',
        'time_slot',
        'status',
        'notes',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'delivery_items');
    }
}