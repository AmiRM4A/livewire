<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id'
    ];

    public function topic(): BelongsTo {
        return $this->belongsTo(Topic::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function commentable(): MorphTo {
        return $this->morphTo();
    }
}
