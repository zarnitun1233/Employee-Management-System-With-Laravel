<?php

namespace App\Dao\Employee;

use App\Models\Employee;
use App\Models\Major;
use App\Contracts\Dao\Employee\EmployeeDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SendMailDataRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Support\Facades\Hash;
/**
 * Data accessing object for post
 */
class EmployeeDao implements EmployeeDaoInterface
{
    /**
     * Home Page Function to show data
     * Search Function
     * @param Request
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * To store Employee data
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->role = $request->role;
        $employee->age = $request->age;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $newImageName = $request->name . '-' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $employee->image = $newImageName;
        $employee->phone = $request->phone;
        $employee->dob = $request->dob;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        return $employee->save();
    }

     /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        return Employee::find($id);
    }

    /**
     * Updating Process
     * @param EmployeeUpdateRequest $request
     * @param $id
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->role = $request->role;
        $employee->age = $request->age;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $newImageName = $request->name . '-' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $employee->image = $newImageName;
        $employee->phone = $request->phone;
        $employee->dob = $request->dob;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        return $employee->save();
    }

    /**
     * Delete Employee
     * @param $id
     */
    public function delete($id)
    {
        $employee = Employee::find($id);
        return $employee->delete();
    }
}
