<?php

namespace App\Contracts\Dao\Salary;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\SalaryUpdateRequest;
use App\Http\Requests\SendMailDataRequest;

/**
 * Interface for Data Accessing Object of Salary
 */
interface SalaryDaoInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index();

    /**
     * To store Salary data
     */
    public function store(StoreSalaryRequest $request);

    /**
     * To show edit form
     * @param $id
     */
    public function edit($id);

    /**
     * Get Department with employee
     */
    public function getDepartmentByEmployee();

    /**
     * Get Department with salary
     * @param $id
     */
    public function getDepartmentBySalary($id);

    /**
     * To create Salary
     */
    public function create();

    /**
     * Updating Process
     * @param SalaryUpdateRequest $request
     * @param $id
     */
    public function update(SalaryUpdateRequest $request, $id);

    /**
     * Delete Salary
     * @param $id
     */
    public function delete($id);
}
