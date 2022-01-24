<?php

namespace App\Dao\Department;

use App\Models\Department;
use App\Models\Major;
use App\Contracts\Dao\Department\DepartmentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SendMailDataRequest;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use Illuminate\Support\Facades\Hash;

/**
 * Data accessing object for post
 */
class EmployeeDao implements DepartmentDaoInterface
{
    /**
     * Home Page Function to show data
     * Search Function
     * @param Request
     */
    public function index()
    {
        return Department::with('department')->paginate(2);
    }

    /**
     * To create Employee
     */
    public function create()
    {
        return Department::all();
    }

    /**
     * To store Employee data
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->department_id = $request->department_id;
        return $department->save();
    }

    /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        return Department::with('department')->find($id);
    }

    /**
     * Updating Process
     * @param EmployeeUpdateRequest $request
     * @param $id
     */
    public function update(DepartmentUpdateRequest $request, $id)
    {
        $department = Department::find($id);
        $department->name = $request->name;
        $department->description = $request->description;
        $department->department_id = $request->department_id;
        return $department->save();
    }

    /**
     * Delete Employee
     * @param $id
     */
    public function delete($id)
    {
        $department = Department::find($id);
        return $department->delete();
    }
}
