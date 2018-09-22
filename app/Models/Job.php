<?php

namespace App\Models;

use DB;

class Job extends Model
{
    use EloquentTrait;

    protected $table = 'job';

    public $timestamps = false;

    protected $fillable = ['level', 'position', 'experience', 'certificate', 'time_start', 'time_end', 'skill',
        'title', 'price', 'quantity', 'status', 'company_id'];
    protected $casts = [
        'price' => 'array',
        'experience' => 'array',
    ];
}
