<?php

namespace App\Models;

use DB;

class Device extends Model
{
    use EloquentTrait;

    protected $table = 'device';

    public $timestamps = false;

    protected $fillable = ['name', 'company_id', 'branch', 'version', 'detail', 'status', 'image', 'free_start',
        'free_end', 'price'];
    protected $casts = [
        'image' => 'array',
        'price' => 'array',
    ];
}
