<?php

namespace App\Contracts\Services\Salary;

use App\Models\Salary;
use Illuminate\Http\Request;
use App\Http\Requests\SendMailDataRequest;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\SalaryUpdateRequest;

/**
 * Interface for salary service
 */
interface SalaryServiceInterface
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
     * To create Salary
     */
    public function create();

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
     * To show edit form
     * @param $id
     */
    public function edit($id);

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

    /**
     * Employee's Salary Detail and show by graph
     * @param $id
     */
    public function detail($id);

    /**
     * Get Department By Employee_id
     * @param $id
     */
    public function getDepartmentByEmployeeId($id);

    /**
     * Get date from Salary Record Table
     * @param $id
     */
    public function dateFromSalaryRecord($id);

    /**
     * Get Salary from Salary Record Table
     * @param $id
     */
    public function salaryFromSalaryRecord($id);
}
