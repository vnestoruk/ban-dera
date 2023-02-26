<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'key';
    protected $keyType = 'char';

    protected $fillable = [
        'key'
    ];

    public function targets()
    {
        $this->belongsToMany(Target::class, 'category_target', 'category_key', 'target_id');
    }
}
