<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{
    private $employeeRepo;
    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
        $this->middleware('auth');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tabActive = 'resource';

        $status = $request->status;
        $employees = $this->employeeRepo->getList(['status' => $status]);

        return view('resource.index', compact('tabActive', 'employees', 'status'));
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
