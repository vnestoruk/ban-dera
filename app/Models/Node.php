<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'host',
        'asn',
        'ip_address',
        'location_iso',
        'location_country',
        'location_city'
    ];

    public function status()
    {
        return $this->hasMany(TargetStatus::class);
    }

    public function available_targets(): int
    {
        return $this
            ->status()
            ->where('error', '=', false)
            ->groupBy('node_id')
            ->count();
    }

}
