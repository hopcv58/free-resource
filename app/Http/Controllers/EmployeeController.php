<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['apiGetJobListCurrent', 'apiGetJobListOther', 'apiUpdateEmployeeRequest']);
    }

    /**
     * Show the application employee page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employs = Employee::where('status', 1)
            ->where('company_id', '!=', Auth::user()->id)
            ->orWhere(function ($query) {
                $query->where('status', '=', 2)
                    ->where('negotiating_id', '!=', Auth::user()->id);
            });
        if ($request->position) {
            $employs = $employs->where('position', $request->position);
        }
        if ($request->free_begin) {
            $employs = $employs->where('free_begin', '<=', $request->free_begin);
        }
        if ($request->free_end) {
            $employs = $employs->where('free_end', '>=', $request->free_end);
        }
        if ($request->level) {
            $employs = $employs->whereIn('level', $request->level);
        }
        $employs = $employs->orderBy('id', 'DESC')
            ->get();
        if ($request->min_price || $request->max_price) {
            $workTime = config('resources.real_price');
            foreach ($employs as $key => $employ) {
                $employ->monthly_price = $employ->price['price_num'] * $workTime[$employ->price['price_unit']];

                if ($request->min_price && ($request->min_price * 30) > $employ->monthly_price) {
                    $employs->forget($key);
                }
                if ($request->max_price && ($request->max_price * 30) < $employ->monthly_price) {
                    $employs->forget($key);
                }
            }
        }

        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'employ';
        $levels = config('resources.level');
        $postions = config('resources.position');
        $technicals = config('resources.technical_skill');

        return view('employee.index', compact('employs', 'colorAvt', 'tabActive', 'levels', 'postions', 'technicals'));
    }

    public function create()
    {
        $levels = config('resources.level');
        $postions = config('resources.position');
        $technicals = config('resources.technical_skill');
        $tabActive = 'resource';
        $status = -1;
        $titleForm = 'Add new employee';
        return view('employee.create', compact('levels', 'postions', 'tabActive', 'status', 'technicals', 'titleForm'));
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
        $input['status'] = !isset($request->is_public);
        if ($request->fully_free) {
            $input['free_end'] = null;
        }
        $result = Employee::create($input);
        $employs = Employee::where('status', 0)->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'employ';
        $levels = config('resources.level');
        $postions = config('resources.position');
        $technicals = config('resources.technical_skill');
        return view('employee.index', compact('employs', 'colorAvt', 'tabActive', 'levels', 'postions', 'technicals'));
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
        $technicals = config('resources.technical_skill');
        $tabActive = 'resource';
        $status = $employee->status;
        $titleForm = 'Update employee info';
        return view('employee.edit', compact('titleForm','employee', 'levels', 'postions', 'tabActive', 'status', 'technicals'));
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
        $employee->is_public = isset($request->is_public);
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

    public function apiGetJobListCurrent(ListEmployeeRequest $request)
    {
        $demands = $request->all();
        if (!isset($demands['filters'])) {
            $filters = [];
        } else {
            $filters = $demands['filters'];
        }
        $model = Employee::query()
            ->orderBy('id', 'DESC');//status of hired

        if ($name = array_pull($filters, 'name')) {
            $model->where('name', 'LIKE', "%$name%");
        }
        if ($companyId = array_pull($filters, 'company_id')) {
            $model->where('company_id', '=', $companyId)
                ->orWhere(function ($query) use ($companyId) {
                    $query->where('status', 2)
                        ->where('negotiating_id', '!=', $companyId);
                });
        }
        if ($position = array_pull($filters, 'position')) {
            $model->where('name', 'LIKE', "%$name%");
        }
        if ($expNum = array_pull($filters, 'exp_num')
            && $expUnit = array_pull($filters, 'exp_unit')) {
            $model->where('experience->exp_num', $expNum);
            $model->where('experience->exp_unit', $expUnit);
        }
        if ($freeBegin = array_pull($filters, 'free_begin')) {
            $model->where('free_begin', '<=', $freeBegin);
        }
        if ($freeEnd = array_pull($filters, 'free_end')) {
            $model->where('free_end', '>=', $freeEnd);
        }
        if ($certificate = array_pull($filters, 'certificate')) {
            $model->where('certificate', 'LIKE', $certificate);
        }
        if ($level = array_pull($filters, 'level')) {
            if (is_array($level)) {
                $model->whereIn('level', $level);
            } else {
                $model->where('level', $level);
            }
        }
        foreach ($filters as $key => $demand) {
            $model->where($key, $demand);
        }
        if ($demands['limit']) {
            $model->limit($demands['limit']);
        }
        $employs = $model->get();

        if (isset($demands['min_price']) || isset($demands['max_price'])) {
            $workTime = config('resources.real_price');
            foreach ($employs as $key => $employ) {
                $employ->monthly_price = $employ->price['price_num'] * $workTime[$employ->price['price_unit']];

                if ($demands['min_price'] && ($demands['min_price'] * 30) > $employ->monthly_price) {
                    $employs->forget($key);
                }
                if ($demands['max_price'] && ($demands['max_price'] * 30) < $employ->monthly_price) {
                    $employs->forget($key);
                }
            }
        }
        return $this->response($employs);
    }

    public function apiGetJobListOther(ListEmployeeRequest $request)
    {
        $demands = $request->all();
        if (!isset($demands['filters'])) {
            $filters = [];
        } else {
            $filters = $demands['filters'];
        }
        $model = Employee::query()
            ->orderBy('id', 'DESC');//status of hired

        if ($name = array_pull($filters, 'name')) {
            $model->where('name', 'LIKE', "%$name%");
        }
        if ($companyId = array_pull($filters, 'company_id')) {
            $model->where('status', 1)
                ->where('company_id', '=', $companyId)
                ->orWhere(function ($query) {
                    $query->where('status', '=', 2)
                        ->where('negotiating_id', '=', 1);
                });
        }
        if ($position = array_pull($filters, 'position')) {
            $model->where('name', 'LIKE', "%$name%");
        }
        if ($expNum = array_pull($filters, 'exp_num')
            && $expUnit = array_pull($filters, 'exp_unit')) {
            $model->where('experience->exp_num', $expNum);
            $model->where('experience->exp_unit', $expUnit);
        }
        if ($freeBegin = array_pull($filters, 'free_begin')) {
            $model->where('free_begin', '<=', $freeBegin);
        }
        if ($freeEnd = array_pull($filters, 'free_end')) {
            $model->where('free_end', '>=', $freeEnd);
        }
        if ($certificate = array_pull($filters, 'certificate')) {
            $model->where('certificate', 'LIKE', $certificate);
        }
        if ($level = array_pull($filters, 'level')) {
            if (is_array($level)) {
                $model->whereIn('level', $level);
            } else {
                $model->where('level', $level);
            }
        }
        foreach ($filters as $key => $demand) {
            $model->where($key, $demand);
        }
        if ($demands['limit']) {
            $model->limit($demands['limit']);
        }
        $employs = $model->get();

        if (isset($demands['min_price']) || isset($demands['max_price'])) {
            $workTime = config('resources.real_price');
            foreach ($employs as $key => $employ) {
                $employ->monthly_price = $employ->price['price_num'] * $workTime[$employ->price['price_unit']];

                if ($demands['min_price'] && ($demands['min_price'] * 30) > $employ->monthly_price) {
                    $employs->forget($key);
                }
                if ($demands['max_price'] && ($demands['max_price'] * 30) < $employ->monthly_price) {
                    $employs->forget($key);
                }
            }
        }
        return $this->response($employs);
    }

    public function apiUpdateEmployeeRequest(UpdateEmployeeRequest $request)
    {
        return $this->response(['result' => Employee::where('id', $request->id)->update([
            "status" => $request->status,
            "negotiating_id" => $request->company_id
        ])
        ]);
    }

    public function destroy()
    {
        return view('home');
    }
}
