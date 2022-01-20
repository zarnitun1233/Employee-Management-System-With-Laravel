<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Salary\SalaryServiceInterface;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\SalaryUpdateRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Salary;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * salaryInterface
     */
    private $salaryInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(SalaryServiceInterface $salaryServiceInterface)
    {
        $this->salaryInterface = $salaryServiceInterface;
    }

    /**
     * Home Page to show salary list
     */
    public function index()
    {
        $salaries = $this->salaryInterface->index();
        return view('frontend.salary.index')->with('salaries', $salaries);
    }

    /**
     * To create Salary
     */
    public function create()
    {
        $employees = Employee::with('department')->get();
        return view('backend.salary.create')->with('employees', $employees);
    }

    /**
     * To store Salary data
     */
    public function store(StoreSalaryRequest $request)
    {
        $this->salaryInterface->store($request);
        return redirect('/salary/list')->with('success', 'Salary Created Successfully!');
    }

    /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        $employees = Employee::with('department')->get();
        $salary = $this->salaryInterface->edit($id);
        $department = DB::table('salaries')
            ->join('employees', 'employees.id', '=', 'salaries.employee_id')
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->select('salaries.*', 'employees.name', 'departments.name')
            ->orderBy('id')
            ->where('salaries.deleted_at', '=', NULL)
            ->where('salaries.id', $id);
        $department = $department->get();
        return view('backend.salary.edit')->with('employees', $employees)->with('salary', $salary)->with('department', $department);
    }

    /**
     * Updating Process
     * @param SalaryUpdateRequest $request
     * @param $id
     */
    public function update(SalaryUpdateRequest $request, $id)
    {
        $this->salaryInterface->update($request, $id);
        return redirect('/salary/list')->with('success', 'Salary Updated Successfully!');
    }

    /**
     * Delete Salary
     * @param $id
     */
    public function delete($id)
    {
        $this->salaryInterface->delete($id);
        return redirect('/salary/list')->with('success', 'Salary Deleted Successfully!');
    } 
}
