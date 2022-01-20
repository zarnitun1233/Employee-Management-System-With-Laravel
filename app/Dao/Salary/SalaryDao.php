<?php

namespace App\Dao\Salary;

use App\Models\Salary;
use App\Models\Major;
use App\Contracts\Dao\Salary\SalaryDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SendMailDataRequest;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\SalaryUpdateRequest;
use Illuminate\Support\Facades\Hash;

/**
 * Data accessing object for salary
 */
class SalaryDao implements SalaryDaoInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index()
    {
        return Salary::with('employee')->paginate(2);
    }

    /**
     * To store Salary data
     */
    public function store(StoreSalaryRequest $request)
    {
        $salary = new Salary();
        $salary->amount = $request->amount;
        $salary->date = $request->date;
        $salary->employee_id = $request->employee_id;
        return $salary->save();
    }

     /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        return Salary::find($id);
    }

    /**
     * Updating Process
     * @param SalaryUpdateRequest $request
     * @param $id
     */
    public function update(SalaryUpdateRequest $request, $id)
    {
        $salary = Salary::find($id);
        $salary->name = $request->name;
        $salary->position = $request->position;
        $salary->role = $request->role;
        $salary->age = $request->age;
        $salary->email = $request->email;
        $salary->password = Hash::make($request->password);
        $newImageName = $request->name . '-' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $salary->image = $newImageName;
        $salary->phone = $request->phone;
        $salary->dob = $request->dob;
        $salary->address = $request->address;
        $salary->department_id = $request->department_id;
        return $salary->save();
    }

    /**
     * Delete Salary
     * @param $id
     */
    public function delete($id)
    {
        $salary = Salary::find($id);
        return $salary->delete();
    }
}
