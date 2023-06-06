<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property int $from_id
 * @property float $latitude
 * @property float $longitude
 * @property string $description
 * @property-read Carbon $created_at
 * @property-read Carbon $updated_at
 */
class Host extends Model
{
    use HasFactory;
}
