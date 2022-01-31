<?php

namespace App\Contracts\Services\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\SendMailDataRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;

/**
 * Interface for post service
 */
interface EmployeeServiceInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index();

    /**
     * To create Employee
     */
    public function create();

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

    public function search();

    public function postSearch(Request $request);

    /**
     * To Export Employees List
     */
    public function export();

}
