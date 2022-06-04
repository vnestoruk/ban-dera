<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

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

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function ipAddress()
    {
        return $this->hasMany(TargetIpAdress::class);
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TargetStatus::class);
    }

    public function suggestedBy()
    {
        return $this->belongsTo(User::class, 'suggested_by');
    }

    public function isDown(): bool
    {
        return !$this
            ->status()
            ->failed()
            ->exists();
    }

    public function health()
    {
        if (!$this->isDown())
        return Cache::remember('target-health-' . $this->id, 3600, function () {
            return number_format($this->status()->failed()->count() / $this->status()->count(), 4);
        });

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

    public function scopeAvailable($query)
    {
        return $query->whereHas('status', function(Builder $query) {
            $query->where('error', '=', false);
        });
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
