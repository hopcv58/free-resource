<?php

namespace App\Models;

use DB;

class Job extends Model
{
    use EloquentTrait;

    protected $table = 'job';

    public $timestamps = false;

}
