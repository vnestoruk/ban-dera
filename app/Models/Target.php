<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'secure',
        'approved'
    ];

    protected $casts = [
        'secure' => 'boolean',
        'approved' => 'boolean'
    ];

    public function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($this->secure ? 'https://' : 'http://') . $value,
        );
    }

    public function health(): Attribute
    {
        return Attribute::make(
            get: function () {
                if ($this->status()->count() === 0) return 0;
                return Cache::remember('target-health-' . $this->id, 3600, function () {
                    return number_format($this->status()->successful()->count() / $this->status()->count(), 4);
                });
            }
        );
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_target', 'target_id', 'category_key');
    }

    public function ipAddress()
    {
        return $this->hasMany(TargetIpAddress::class);
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
                    $query->where('location_iso', '=', $locationISO);
                });
        });
    }

    public function scopeSearch($query, $keyword)
    {
        return $query->where('id', 'LIKE', '%' . $keyword . '%')
            ->orWhere('url', 'LIKE', '%' . $keyword . '%')
            ->orWhereHas('suggestedBy', function ($query) use ($keyword) {
                $keyword = str_replace('@', '', $keyword);
                return $query->where('nickname', 'LIKE', '%' . $keyword . '%');
            });
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }

    public function scopeUnderAttack($query)
    {
        return $query->where('under_attack', true);
    }

}
