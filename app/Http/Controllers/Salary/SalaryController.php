<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Salary\SalaryServiceInterface;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\SalaryUpdateRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\SalaryRecord;
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
        $employees = $this->salaryInterface->create();
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
        $employees = $this->salaryInterface->getDepartmentByEmployee();
        $salary = $this->salaryInterface->edit($id);
        $department = $this->salaryInterface->getDepartmentBySalary($id);
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
     * Employee's Salary Detail and show by graph
     * @param $id
     */
    public function detail($id)
    {
        $details = $this->salaryInterface->detail($id);
        $department = $this->salaryInterface->getDepartmentByEmployeeId($id);
        $date = $this->salaryInterface->dateFromSalaryRecord($id);
        $salary = $this->salaryInterface->salaryFromSalaryRecord($id);
        return view('frontend.salary.detail')->with('details', $details)->with('department', $department)->with('date', json_encode($date, JSON_NUMERIC_CHECK))
            ->with('salary', json_encode($salary, JSON_NUMERIC_CHECK));
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
