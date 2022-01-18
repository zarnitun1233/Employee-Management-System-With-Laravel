<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Contracts\Services\Employee\EmployeeServiceInterface;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ImageResize;
use App\Image;

class EmployeeController extends Controller
{
    /**
     * employeeInterface
     */
    private $employeeInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(EmployeeServiceInterface $employeeServiceInterface)
    {
        $this->employeeInterface = $employeeServiceInterface;
    }

    /**
     * Home Page to show employee list
     */
    public function index()
    {
        $employees = $this->employeeInterface->index();
        return view('frontend.employee.index')->with('employees', $employees);
    }

    /**
     * To create Employee
     */
    public function create()
    {
        return view('backend.employee.create');
    }

    /**
     * To store Employee data
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeInterface->store($request);
        return redirect('/employee/list')->with('success', 'Employee Created Successfully!');
    }

    /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        $employee = $this->employeeInterface->edit($id);
        return view('backend.employee.edit')->with('employee', $employee);
    }

    /**
     * Updating Process
     * @param EmployeeUpdateRequest $request
     * @param $id
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $this->employeeInterface->update($request, $id);
        return redirect('/employee/list')->with('success', 'Employee Updated Successfully!');
    }

    /**
     * Delete Employee
     * @param $id
     */
    public function delete($id)
    {
        $this->employeeInterface->delete($id);
        return redirect('/employee/list')->with('success', 'Employee Deleted Successfully!');
    }   
}
