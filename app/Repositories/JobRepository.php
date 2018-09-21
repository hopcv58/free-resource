<?php

namespace App\Repositories;

use App\Models\Job;
use Illuminate\Support\Collection;

class JobRepository extends Repository
{
    /**
     * @var Job
     */
    private $job;

    /**
     * NewsRepository constructor.
     */
    public function __construct()
    {
        $this->job = new Job();
    }
}