<?php

namespace App\Models;

use DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company  extends Authenticatable
{
    use EloquentTrait;

    protected $table = 'company';

    public $timestamps = false;

    protected $fillable = ['name', 'address', 'phone', 'email', 'username', 'password', 'most_interest', 'remember_token'];

    public function oEmployee()
    {
        return $this->hasMany('App\Models\Employee','company_id','id');
    }


}
