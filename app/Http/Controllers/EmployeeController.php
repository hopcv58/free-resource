<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['apiGetEmployeeList', 'apiUpdateEmployeeRequest']);
    }

    /**
     * Show the application employee page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employs = Employee::where('status', 0)
            //TODO: remove hard fix
            ->where('company_id', '!=', 1)
            ->where('is_public', '=', 1)->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'employ';

        return view('employee.index', compact('employs', 'colorAvt' , 'tabActive'));
    }

    public function create()
    {
        $levels = config('resources.level');
        $postions = config('resources.position');
        $tabActive = 'resource';
        $status = -1;
        return view('employee.create', compact('levels', 'postions', 'tabActive', 'status'));
    }

    public function store(Request $request)
    {
        //TODO: validate input
        $input = $request->all();
        $input['experience'] = [
            'exp_num' => $input['exp_num'],
            'exp_unit' => $input['exp_unit']
        ];
        $input['company_id'] = Auth::user()->id;
        $input['price'] = [
            'price_num' => $input['price_num'],
            'price_unit' => $input['price_unit'],
        ];
        if ($request->fully_free) {
            $input['free_end'] = null;
        }
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

    public function edit($id, Request $request)
    {
        $employee = Employee::find($id);
        $levels = config('resources.level');
        $postions = config('resources.position');
        $tabActive = 'resource';
        $status = $request ? $request->status : 0;
        return view('employee.edit', compact('employee', 'levels', 'postions', 'tabActive','status'));
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

    public function apiGetEmployeeList(ListEmployeeRequest $request)
    {
        $demands = $request->all();
        if (!isset($demands['filters'])) {
            $filters = [];
        } else {
            $filters = $demands['filters'];
        }
        $model = Employee::query()->where('status', '!=', 2)//status of hired
        ->where('is_public', '=', 1);// not public
        if ($name = array_pull($filters, 'name')) {
            $model->where('name', 'LIKE', "%$name%");
        }
        if ($position = array_pull($filters, 'position')) {
            $model->where('name', 'LIKE', "%$name%");
        }
        if ($expNum = array_pull($filters, 'exp_num')
            && $expUnit = array_pull($filters, 'exp_unit') ) {
            $model->where('experience->exp_num', $expNum);
            $model->where('experience->exp_unit', $expUnit);
        }
        if ($freeBegin = array_pull($filters, 'free_begin')) {
            $model->where('free_begin','<=', $freeBegin);
        }
        if ($freeEnd = array_pull($filters, 'free_end')) {
            $model->where('free_end','>=', $freeEnd);
        }
        if ($certificate = array_pull($filters, 'certificate')) {
            $model->where('certificate','LIKE', $certificate);
        }
        foreach ($filters as $key => $demand) {
            $model->where($key, $demand);
        }
        if ($demands['limit']) {
            $model->limit($demands['limit']);
        }
        return $this->response($model->get());
    }

    public function apiUpdateEmployeeRequest(UpdateEmployeeRequest $request)
    {
        return $this->response(['result' => Employee::where('id', $request->id)->update([
            "status" => $request->status
        ])
        ]);
    }

    public function destroy()
    {
        return view('home');
    }
}
