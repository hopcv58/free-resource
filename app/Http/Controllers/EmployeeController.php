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
        return view('employ.index');
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
        $input = [
            'experience->exp_num' => $request->exp_num,
            'experience->exp_unit' => $request->exp_unit,
            'price->price_num' => $request->price_num,
            'price->price_unit' => $request->price_unit,
            'name' => $request->name,
            'position' => $request->position,
            'age' => $request->age,
            'level' => $request->level,
            'skill' => $request->detail,
            'certificate' => $request->certificate,
        ];
        $result = Employee::where('id', $id)->update($input);
        $employee = Employee::find($id);
        return view('employee.detail', compact('employee', 'levels', 'postions'));
    }

    public function destroy()
    {
        return view('home');
    }
}
