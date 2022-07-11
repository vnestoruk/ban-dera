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
            'url' => $this->getRawOriginal('url'),
            'health' => $this->health,
            'ip_addresses' => $this->when(!self::$_IS_COLLECTION, $this->ipAddress),
            'categories' => $this->categories->pluck('title'),
            'suggested_by' => UserResource::make($this->suggestedBy)->hide(['suggestions']),
            'ia_approved' => $this->approved,
            'status' => $this->when(!self::$_IS_COLLECTION, TargetStatusResource::collection($this->status)),
        ];
    }
}
