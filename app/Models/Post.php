<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;

//    /**
//     * Get the comments for the blog post.
//     */
//    public function comments(): HasMany
//    {
//        return $this->hasMany(Comment::class);
//
    ////        return $this->hasMany(
    ////            related: Comment::class,
    ////            foreignKey: 'post_id',
    ////            localKey: 'id',
    ////        );
//    }

    /**
     * Get all the post's comments.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');

//        return $this->morphMany(
//            related: Comment::class,
//            name: 'commentable',
//            type: 'commentable_type',
//            id: 'commentable_id',
//            localKey: 'id',
//        );
    }

    /**
     * Get the post's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Get all the tags for the post.
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');

//        return $this->morphToMany(
//            related: Tag::class,
//            name: 'taggable',
//            table: 'taggables',
//            foreignPivotKey: 'taggable_id',
//            relatedPivotKey: 'tag_id',
//            parentKey: 'id',
//            relatedKey: 'id',
//            relation: 'tags',
//            inverse: false,
//        );
    }
}
