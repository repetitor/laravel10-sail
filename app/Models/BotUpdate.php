<?php

namespace App\Models;

use App\Enums\CommandEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property-read int $update_id
 * @property-read int $message_id
 * @property-read int $date
 * @property-read string $text
 * @property-read string $command
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
class BotUpdate extends Model
{
    use HasFactory;

    protected $fillable = [
        'update_id',
        'message_id',
        'date',
        'text',
        'command',
    ];

    protected $casts = [
        ////    protected array $enums = [
        //        'command' => CommandEnum::class . ':nullable',
        ////        'command' => CommandEnum::class,
    ];
}
