<?php

namespace App\Models\Traits;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Commentable {
    public function comments(): MorphMany {
        return $this->morphMany(Comment::class, 'commentable', 'commentable_type', 'commentable_id');
    }

    public function commentedBy(User $user, string $content): Model {
        return $this->comments()->create([
            'user_id' => $user->id,
            'content' => $content
        ]);
    }
}
