<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Url extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            Log::info("Creating the url");
            $item->user_id = auth()->id();
            $item->visitor_count = 100;
        });
        // static::created(function ($item) {
        //     Log::info("Deleting the record");
        //     $item->delete();
        // });
    }

    public function visitors(): HasMany
    {
        return $this->hasMany(Visitor::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
