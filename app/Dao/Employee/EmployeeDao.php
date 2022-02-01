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
use Carbon\Carbon;


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
        return Employee::with('department')->paginate(5);
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
        $name = $request->name ?? null;
        $position =$request->position ?? null;
        $joinDate = $request->join_date ?? null;
        $department = $request->department ?? null; 
        if($name || $position || $joinDate || $department)
        {
            $finds =DB::table('employees')
            ->select('employees.*','departments.name as department_name')
            ->join('departments','departments.id','=','employees.department_id')
            ->where('employees.deleted_at','=',NULL);
             $finds = $name ? $finds->where('employees.name','LIKE','%'.$name.'%') : $finds;

            $finds = $position ? $finds->where('employees.position','LIKE',$position) : $finds;

            $finds = $joinDate ? $finds->where('employees.created_at','LIKE','%'.$joinDate.'%') : $finds;

            $finds = $department ? $finds->where('departments.id','=',$department) : $finds;

            $founds = $finds->get();
        
            $foundSArray= [];
            $newArray =[];
            foreach($founds as  $found){
                foreach($found as $key => $value){
                    if($key !== 'password'){
                        $newArray[$key] = $value;
                    }
                }
                $foundSArray[] = $newArray;
            }
            return $foundSArray;
        }
        return [];
    }   
}
