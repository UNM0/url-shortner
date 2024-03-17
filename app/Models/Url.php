<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Url extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
