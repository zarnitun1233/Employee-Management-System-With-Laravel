<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Contracts\Services\Department\DepartmentServiceInterface;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ImageResize;
use App\Image;

class DepartmentController extends Controller
{
    /**
     * departmentInterface
     */
    private $departmentInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(DepartmentServiceInterface $departmentServiceInterface)
    {
        $this->departmentInterface = $departmentServiceInterface;
    }

    /**
     * Home Page to show department list
     */
    public function index()
    {
        $departments = $this->departmentInterface->index();
        return view('frontend.department.index')->with('departments', $departments);
    }

    /**
     * To create Department
     */
    public function create()
    {
        $departments = $this->departmentInterface->create();
        return view('backend.department.create')->with('departments', $departments);
    }

    /**
     * To store Department data
     */
    public function store(StoreDepartmentRequest $request)
    {
        $this->departmentInterface->store($request);
        return redirect()->route('department-list')->with('success', 'Departments Created Successfully!');
    }

    /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        $dep = $this->departmentInterface->edit($id);
        $departments = $this->departmentInterface->create();
        return view('backend.department.edit')->with('dep', $dep)->with('departments', $departments);
    }

    /**
     * Updating Process
     * @param DepartmentUpdateRequest $request
     * @param $id
     */
    public function update(DepartmentUpdateRequest $request, $id)
    {
        $this->departmentInterface->update($request, $id);
        return redirect()->route('department-list')->with('success', 'Department Updated Successfully!');
    }

    /**
     * Delete Department
     * @param $id
     */
    public function delete($id)
    {
        $this->departmentInterface->delete($id);
        return redirect()->route('department-list')->with('success', 'Department Deleted Successfully!');
    }
}