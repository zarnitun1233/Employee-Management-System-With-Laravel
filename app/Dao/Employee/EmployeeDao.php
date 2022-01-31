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
use App\Models\Department;
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
        return Employee::with('department')->paginate(2);
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
        return Employee::with('department')->find($id);
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
        if ($request->image) {
            $newImageName = $request->name . '-' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
            $employee->image = $newImageName;
        }
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

    public function search()
    {
       return $departments = Department::all();
    }

    
    public function postSearch(Request $request)
    {   
        $employeeArray =[];
        $name = $request->name;
        $position =$request->position;
        $joinDate = $request->join_date;

        $finds =Employee::where('name','LIKE','%'.$name.'%');

        $finds = $position ? $finds->where('position','=',$position) :  $finds;

        $finds = $joinDate ? $found->where('created_at','=',$joinDate) : $finds;

        $founds = $finds->get();
        
        foreach($founds as $found)
        {
           $employee = [
            'id' => $found->id,
            'name' => $found->name,
            'position' => $found->position,
            'department' => $found->department->name,
            'email' =>$found->email,
            'dob'   => $found->dob,
            'phone' => $found->phone,
            'image' => $found->image,
            'address' => $found->address,
            'department_id' => $found->department_id
           ];
           $employeeArray[] = $employee;
        }
        if($datas['department'])
        {
         $employeeArray =  array_filter($employeeArray,function($v) use($datas){
            return  $v['department'] === $datas['department'];
           }, ARRAY_FILTER_USE_BOTH);
        }
        dd($employeeArray);
    }   
}
