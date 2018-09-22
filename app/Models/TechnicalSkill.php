<?php

namespace App\Models;

use DB;

class TechnicalSkill extends Model
{
    use EloquentTrait;

    protected $table = 'technical-skill';

    public $timestamps = false;
}
