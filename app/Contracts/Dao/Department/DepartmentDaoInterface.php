<?php

namespace App\Contracts\Dao\Department;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Dao\Department\DepartmentDao;
use App\Http\Requests\SendMailDataRequest;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\DepartmentUpdateRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface DepartmentDaoInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index();

    /**
     * To create Department
     */
    public function create();

    /**
     * To store Department data
     */
    public function store(StoreDepartmentRequest $request);

     /**
     * To show edit form
     * @param $id
     */
    public function edit($id);

    /**
     * Updating Process
     * @param DepartmentUpdateRequest $request
     * @param $id
     */
    public function update(DepartmentUpdateRequest $request, $id);

    /**
     * Delete Department
     * @param $id
     */
    public function delete($id);
}