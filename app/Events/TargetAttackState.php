<?php

namespace App\Events;

use App\Http\Resources\TargetResource;
use App\Models\Target;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TargetAttackState implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public TargetResource $target;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Target $target)
    {
        $this->target = TargetResource::make($target);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('default');
    }
}
