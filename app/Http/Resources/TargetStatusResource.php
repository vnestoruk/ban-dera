<?php

namespace App\Http\Resources;


use App\Http\Resources\Json\JsonResource;

class TargetStatusResource extends JsonResource
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
            'is_down' => $this->error,
            'status_code' => $this->status_code,
            'message' => $this->message,
            'response_time' => $this->response_time,
            'last_checked' => $this->created_at,
            'node' => NodeResource::make($this->node),
        ];
    }
}
