<?php

namespace App\Http\Resources;

use App\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->filterFields([
            'id' => $this->id,
            'nickname' => $this->nickname,
            'suggestions_count' => $this->suggestions()->count(),
            'roles' => $this->getRoleNames()
        ]);
    }
}
