<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'host' => $this->host,
            'asn' => $this->asn,
            'available_targets_count' => $this->available_targets(),
            'location' => [
                'iso' => $this->location_iso,
                'country' => $this->location_country,
                'city' => $this->location_city,
            ]
        ];
    }
}
