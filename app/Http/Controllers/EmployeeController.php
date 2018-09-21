<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Show the application employee page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employ.index');
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        //TODO: validate input
        $input = $request->all();
        $input['experience'] = [
            'exp_num' => $input['exp_num'],
            'exp_unit' => $input['exp_unit']
        ];
        $input['price'] = [
            'price_num' => $input['price_num'],
            'price_unit' => $input['price_unit'],
        ];
        //hard fix company_id
        //TODO: remove hard fix
        $input['company_id'] = 1;
        $result = Employee::create($input);
        return view('employ.index');
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
