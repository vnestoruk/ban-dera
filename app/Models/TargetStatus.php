<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function statusCode(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return !is_null($value) ? $value: 'XXX';
            }
        );
    }

    public function scopeFailed($query)
    {
        return $query->where('error', '=', true);
    }

    public function scopeSuccessful($query)
    {
        return $query->where('error', '=', false);
    }
}
