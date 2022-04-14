<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proxy extends Model
{
    use HasFactory;

    public $timestamps = true;

    /**
     * layer 4 (TCP/UDP) | layer 7 (SSL)
     * SOCKS4 - supports only TCP
     * SOCKS5 - supports TCP/UDP, remote DNS-query
     * HTTP - web
     */
    public const PROXY_TYPES = [
        'http',
        'https',
        'socks4',
        'socks5'
    ];

    protected $fillable = [
        'ip_port',
        'proxy_type',
        'is_alive'
    ];

    /**
     * Get only alive proxies, that are worked fine on request with code 200
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAlive($query)
    {
        return $query->where('is_alive', '=', 1);
    }

    /**
     * Get fresh not yet tested proxies also...
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUntested($query)
    {
        return $query->orWhereNull('is_alive');
    }


    public function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ($this->proxy_type . '://' . $this->ip_port),
        );
    }

    public function ip(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => (explode(':', $this->ip_port)[0]),
        );
    }
}
