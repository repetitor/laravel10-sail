<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    /**
     * Get the parent imageable model (user or post).
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();

//        return $this->morphTo(
        ////            name: 'imageable',
//            name: __FUNCTION__,
//            type: 'imageable_type',
//            id: 'imageable_id',
//            ownerKey: 'id',
//        );
    }
}
