<?php

namespace App\Http\Resources;

use App\Http\Resources\Json\JsonResource;

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
            'secure' => $this->secure,
            'url' => $this->getRawOriginal('url'),
            'health' => $this->health,
            'ip_addresses' => $this->when(!self::$_IS_COLLECTION, $this->ipAddress),
            'categories' => $this->categories()->pluck('key'),
            'suggested_by' => UserResource::make($this->suggestedBy)->hide(['suggestions']),
            'approved' => $this->approved,
            'under_attack' => $this->under_attack,
            'status' => $this->when(!self::$_IS_COLLECTION, TargetStatusResource::collection($this->status)),
        ];
    }
}
