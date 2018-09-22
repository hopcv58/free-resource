<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Support\Collection;

class EmployeeRepository extends Repository
{
    /**
     * @var Employee
     */
    private $eployee;

    /**
     * NewsRepository constructor.
     */
    public function __construct()
    {
        $this->eployee = new Employee();
    }

    public function getList($condition)
    {
        $query = Employee::where($condition);
        return $query->orderBy('id', 'DESC')->get();
    }
}