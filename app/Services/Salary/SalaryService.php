<?php

namespace App\Services\Salary;

use App\Models\Employee;
use App\Contracts\Dao\Salary\SalaryDaoInterface;
use App\Contracts\Services\Salary\SalaryServiceInterface;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\SalaryUpdateRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Mail\TestMail;
use App\Mail\sendMailData;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendMailDataRequest;

/**
 * Service class for post.
 */
class SalaryService implements SalaryServiceInterface
{
    /**
     * Salary dao
     */
    private $salaryDao;

    /**
     * Class Constructor
     * @param SalaryDaoInterface
     */
    public function __construct(SalaryDaoInterface $salaryDao)
    {
        $this->salaryDao = $salaryDao;
    }

    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index()
    {
        return $this->salaryDao->index();
    }

    /**
     * To store Salary data
     */
    public function store(StoreSalaryRequest $request)
    {
        return $this->salaryDao->store($request);
    }

    /**
     * To create Salary
     */
    public function create()
    {
        return $this->salaryDao->create();
    }

    /**
     * Get Department with employee
     */
    public function getDepartmentByEmployee()
    {
        return $this->salaryDao->getDepartmentByEmployee();
    }

    /**
     * Get Department with salary
     * @param $id
     */
    public function getDepartmentBySalary($id)
    {
        return $this->salaryDao->getDepartmentBySalary($id);
    }

    /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        return $this->salaryDao->edit($id);
    }

    /**
     * Updating Process
     * @param SalaryUpdateRequest $request
     * @param $id
     */
    public function update(SalaryUpdateRequest $request, $id)
    {
        return $this->salaryDao->update($request, $id);
    }

    /**
     * Delete Salary
     * @param $id
     */
    public function delete($id)
    {
        return $this->salaryDao->delete($id);
    }

    /**
     * Employee's Salary Detail and show by graph
     * @param $id
     */
    public function detail($id)
    {
        return $this->salaryDao->detail($id);
    }

    /**
     * Get Department By Employee_id
     * @param $id
     */
    public function getDepartmentByEmployeeId($id)
    {
        return $this->salaryDao->getDepartmentByEmployeeId($id);
    }

    /**
     * Get date from Salary Record Table
     * @param $id
     */
    public function dateFromSalaryRecord($id)
    {
        return $this->salaryDao->dateFromSalaryRecord($id);
    }

    /**
     * Get Salary from Salary Record Table
     * @param $id
     */
    public function salaryFromSalaryRecord($id)
    {
        return $this->salaryDao->salaryFromSalaryRecord($id);
    }
}
