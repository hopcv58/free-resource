<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tabActive = 'resource';

        $employees = $this->employeeRepo->getList();

        return view('resource.index', compact('tabActive', 'employees'));
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store($re)
    {
        return view('home');
    }

    public function show()
    {
        return view('home');
    }

    public function edit()
    {
        return view('home');
    }

    public function update()
    {
        return view('home');
    }

    public function destroy()
    {
        return view('home');
    }
}
