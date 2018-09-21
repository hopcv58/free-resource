<?php

namespace App\Models;

use DB;

class Device extends Model
{
    use EloquentTrait;

    protected $table = 'device';

    public $timestamps = false;

}
