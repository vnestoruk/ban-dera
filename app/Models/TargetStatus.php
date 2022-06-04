<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function target(): BelongsTo
    {
        return $this->belongsTo(Target::class);
    }

    public function node(): BelongsTo
    {
        return $this->belongsTo(Node::class);
    }

    public function scopeFailed($query)
    {
        return $query->where('error', '=', true);
    }
}
