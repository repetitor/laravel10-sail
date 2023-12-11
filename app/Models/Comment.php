<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * Get the post that owns the comment.
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);

//        return $this->belongsTo(
//            related: Post::class,
//            foreignKey: 'post_id',
//            ownerKey: 'id',
//            relation: 'post',
//        );
    }
}
