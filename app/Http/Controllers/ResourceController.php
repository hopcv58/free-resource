<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Job;
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

        if(!isset($request->status)) {
            $status = 0;
        } else {
            $status = $request->status;
        }

        $employees = $this->employeeRepo->getList(['status' => $status, 'company_id' => Auth::id()]);

        return view('resource.index', compact('tabActive', 'employees', 'status'));
    }

    public function updateStatus(Request $request)
    {
        if($request->status == 1) { // người dùng đang thương lượng
            $find = Employee::find($request->id);
            if($find->company_id == Auth::id()) { // không thể thuê nhân viên của mình
                return back()->withInput()->withErrors(['Can not select your employee. Please select another one']);
            } else {
                Employee::where('id', $request->id)->update([
                    "status" => $request->status
                ]);
            }
        } else { // HR/công ty xác nhận tình trạng thuê
            Employee::where('id', $request->id)->update([
                "status" => $request->status
            ]);
        }

        return back()->withInput();
    }

    public function jobStatus()
    {
        $jobs = Job::where('company_id', '=', Auth::user()->id)
            ->orderBy('id', 'DESC')->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'resource';

        $status = 0;
        $technicals = config('resources.technical_skill');
        $postions = config('resources.position');
        $levels = config('resources.level');
        return view('resource.job', compact('jobs', 'colorAvt', 'tabActive', 'levels', 'postions', 'technicals', 'status'));
    }

    public function jobHiring()
    {
        $jobs = Employee::where('negotiating_id', '=', Auth::user()->id)
            ->where('status', '2')
            ->orderBy('id', 'DESC')->get();
        $colorAvt = ['#e1663f', '#558ed5', '#92d050'];
        $tabActive = 'resource';

        $status = 0;
        $technicals = config('resources.technical_skill');
        $postions = config('resources.position');
        $levels = config('resources.level');
        return view('resource.job', compact('jobs', 'colorAvt', 'tabActive', 'levels', 'postions', 'technicals', 'status'));
    }
}
