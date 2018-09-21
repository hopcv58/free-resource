<?php

namespace App\Repositories;

use App\Models\Company;
use Illuminate\Support\Collection;

class CompanyRepository extends Repository
{
    /**
     * @var Company
     */
    private $company;

    /**
     * NewsRepository constructor.
     */
    public function __construct()
    {
        $this->company = new Company();
    }
}