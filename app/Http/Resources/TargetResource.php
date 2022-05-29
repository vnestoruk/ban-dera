<?php

namespace App\Http\Resources;

use App\Models\TargetStatus;
use Illuminate\Http\Resources\Json\JsonResource;

class TargetResource extends JsonResource
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
            'id' => $this->id,
            'url' => $this->url,
            'ip_addresses' => $this->ip_address,
            'categories' => $this->categories,
            'is_down' => $this->is_down()
        ];
    }
}
