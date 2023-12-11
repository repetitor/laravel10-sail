<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * Get all the posts that are assigned this tag.
     */
    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'taggable');

//        return $this->morphedByMany(
//            related: Post::class,
//            name: 'taggable',
//            table: 'taggables',
//            foreignPivotKey: 'tag_id',
//            relatedPivotKey: 'taggable_id',
//            parentKey: 'id',
//            relatedKey: 'id',
//            relation: 'posts',
//        );
    }
}
