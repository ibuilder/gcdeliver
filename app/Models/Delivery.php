<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Delivery extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'title',
        'date',
        'time_slot',
        'location',
        'unload_duration',
        'status',
        'notes',
        'estimated_delivery_date',
        'actual_delivery_date',
        'tracking_number'
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'fileable');
    }
}