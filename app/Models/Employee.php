<?php

namespace App\Models;

use DB;

class Employee extends Model
{
    use EloquentTrait;

    protected $table = 'employee';

    public $timestamps = false;

    protected $fillable = ['name', 'position', 'age', 'level', 'experience', 'skill', 'free_end', 'detail',
        'certificate', 'price', 'company_id', 'status', 'negotiating_id', 'rented_id'];
    protected $casts = [
        'experience' => 'array',
        'price' => 'array',
    ];


}
