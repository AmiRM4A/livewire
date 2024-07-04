<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function scopeSortBy(Builder $builder, array $params): void {
        if (isset($params['sort'])){
            $sort = strtolower($params['sort']);
            if ($sort === 'asc') {
                $builder->orderBy('created_at', 'ASC');
            } else if ($sort === 'desc') {
                $builder->orderBy('created_at', 'DESC');
            }
        }
    }
}
