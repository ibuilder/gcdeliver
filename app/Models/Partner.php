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
    protected $fillable = [
        'name', 'contact_person', 'contact_email', 'contact_phone'
    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'item_partners');
    }
}
