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
        $employs = Employee::where('status', 0 )->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'employ';

        return view('employee.index', compact('employs', 'colorAvt' , 'tabActive'));
    }

    public function create()
    {
        $levels = config('resources.level');
        $postions = config('resources.position');
        $tabActive = 'resource';
        return view('employee.create', compact('levels', 'postions', 'tabActive'));
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
        $employs = Employee::where('status', 0 )->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'employ';
        return view('employee.index', compact('employs', 'colorAvt' , 'tabActive'));
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        $levels = config('resources.level');
        $postions = config('resources.position');
        return view('employee.detail', compact('employee', 'levels', 'postions'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $levels = config('resources.level');
        $postions = config('resources.position');
        $tabActive = 'resource';
        return view('employee.edit', compact('employee', 'levels', 'postions', 'tabActive'));
    }

    public function update(Request $request, $id)
    {
        $levels = config('resources.level');
        $postions = config('resources.position');
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->age = $request->age;
        $employee->level = $request->level;
        $employee->skill = $request->skill;
        $employee->certificate = $request->certificate;
        $employee->experience = [
            "exp_num" => $request->exp_num,
            "exp_unit" => $request->exp_unit
        ];
        $employee->price = [
            "price_num" => $request->price_num,
            "price_unit" => $request->price_unit
        ];
        $result = $employee->save();
        return view('employee.detail', compact('employee', 'levels', 'postions'));
    }

    public function destroy()
    {
        return view('home');
    }
}
