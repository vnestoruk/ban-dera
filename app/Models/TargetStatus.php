<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'error',
        'response_time',
        'message',
        'status_code',
        'ip_address'
    ];

    public function target(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Target::class);
    }

    public function node(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Node::class);
    }
}
