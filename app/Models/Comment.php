<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Comment extends Model
{
        /**
     * Get the parent commentable model (project or schedule).
     */
    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
    public function user(): BelongsTo {
        return $this->belongsTo(\App\Models\User::class);
    }
}
