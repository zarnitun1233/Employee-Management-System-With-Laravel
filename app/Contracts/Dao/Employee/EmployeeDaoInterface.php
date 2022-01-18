<?php

namespace App\Contracts\Dao\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\SendMailDataRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface EmployeeDaoInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index();

    /**
     * To store Employee data
     */
    public function store(StoreEmployeeRequest $request);

     /**
     * To show edit form
     * @param $id
     */
    public function edit($id);

    /**
     * Updating Process
     * @param EmployeeUpdateRequest $request
     * @param $id
     */
    public function update(EmployeeUpdateRequest $request, $id);

    /**
     * Delete Employee
     * @param $id
     */
    public function delete($id);
}
