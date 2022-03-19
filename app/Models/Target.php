<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'secure'
    ];

    public function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($this->secure ? 'https://' : 'http://') . $value,
        );
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TargetStatus::class);
    }

    public function is_down(): bool
    {
        return !$this
            ->status()
            ->where('error', '=', false)
            ->exists();
    }

    public function ip_address(): \Illuminate\Support\Collection
    {
        return $this
            ->status()
            ->whereNotNull('ip_address')
            ->groupBy('ip_address')
            ->get('ip_address')
            ->pluck('ip_address');
    }

    public function available_from(): \Illuminate\Support\Collection
    {
        return $this
            ->status()
            ->where('error', '=', false)
            ->groupBy('node_id')
            ->get()
            ->pluck('node.location_country', 'node.location_iso');
    }

    public function scopeAvailableFrom($query, $locationISO = null)
    {
        if (is_null($locationISO)) return $query;
        return $query->whereHas('status', function (Builder $query) use ($locationISO) {
            $query
                ->where('error', '=', false)
                ->whereHas('node', function (Builder $query) use ($locationISO) {
                    $query
                        ->where('location_iso', '=', $locationISO);
                });
        });

    }

}
