<?php

namespace App\Http\Resources;

use App\Models\Host;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var Host $this */
        return [
            'id' => $this->id,
            'from_id' => $this->from_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'description' => $this->description,
            'updated_at' => $this->updated_at,
        ];
    }
}
