<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetIpAddress extends Model
{
    use HasFactory;

    const _TYPE = [
        'IPv4' => 'ipv4',
        'IPv6' => 'ipv6'
    ];

    protected $fillable = [
        'type',
        'ip_address',
        'port',
        'secure',
        'tcp',
        'udp'
    ];
}
