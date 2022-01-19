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
}
