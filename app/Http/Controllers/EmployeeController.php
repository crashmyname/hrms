<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $title = "Employee Data";
        if($request->ajax()){
            $emp = Employee::select('eid','nik','name','departement','section','hire_date','birth_date','golongan','religion','education','blood_type','email','emp_status','salary')->limit(10);
            return DataTables::of($emp)
            ->make(true);
        }
        return view('employees.employee',compact('title'));
    }
}
