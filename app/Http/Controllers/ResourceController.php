<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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
}
