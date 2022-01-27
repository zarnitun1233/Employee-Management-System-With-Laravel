<?php

namespace App\Dao\Salary;

use App\Models\Salary;
use App\Models\Employee;
use App\Contracts\Dao\Salary\SalaryDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SendMailDataRequest;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\SalaryUpdateRequest;
use Illuminate\Support\Facades\Hash;

/**
 * Data accessing object for salary
 */
class SalaryDao implements SalaryDaoInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index()
    {
        return Salary::with('employee')->paginate(2);
    }

    /**
     * To store Salary data
     */
    public function store(StoreSalaryRequest $request)
    {
        $salary = new Salary();
        $salary->amount = $request->amount;
        $salary->date = $request->date;
        $salary->employee_id = $request->employee_id;
        return $salary->save();
    }

    /**
     * To create Salary
     */
    public function create()
    {
        return Employee::with('department')->get();
    }

    /**
     * Get Department with employee
     */
    public function getDepartmentByEmployee()
    {
        return Employee::with('department')->get();
    }

    /**
     * Get Department with salary
     * @param $id
     */
    public function getDepartmentBySalary($id)
    {
        $department = DB::table('salaries')
            ->join('employees', 'employees.id', '=', 'salaries.employee_id')
            ->join('departments', 'departments.id', '=', 'employees.department_id')
            ->select('salaries.*', 'employees.name', 'departments.name')
            ->orderBy('id')
            ->where('salaries.deleted_at', '=', NULL)
            ->where('salaries.id', $id);
        return $department->get();
    }

    /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        return Salary::find($id);
    }

    /**
     * Updating Process
     * @param SalaryUpdateRequest $request
     * @param $id
     */
    public function update(SalaryUpdateRequest $request, $id)
    {
        $salary = Salary::find($id);
        $salary->amount = $request->amount;
        $salary->date = $request->date;
        return $salary->save();
    }

    /**
     * Delete Salary
     * @param $id
     */
    public function delete($id)
    {
        $salary = Salary::find($id);
        return $salary->delete();
    }
}
