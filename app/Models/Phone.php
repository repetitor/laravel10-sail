<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the phone.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

//        return $this->belongsTo(
//            related: User::class,
//            foreignKey: 'user_id',
//            ownerKey: 'id',
//            relation: 'user',
//        );
    }
}
