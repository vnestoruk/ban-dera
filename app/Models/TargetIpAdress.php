<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetIpAdress extends Model
{
    const _TYPE = [
        'IPv4' => 'ipv4',
        'IPv6' => 'ipv6'
    ];

    use HasFactory;
}
