<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Partner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id',
        'name', 'contact_information'
    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'item_partners');
    }
}
