<?php

namespace App\Models;

use DB;

class Company extends Model
{
    use EloquentTrait;

    protected $table = 'company';

    public $timestamps = false;

}
