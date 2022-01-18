<?php

namespace App\Services\Employee;

use App\Models\Employee;
use App\Contracts\Dao\Employee\EmployeeDaoInterface;
use App\Contracts\Services\Employee\EmployeeServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Mail\TestMail;
use App\Mail\sendMailData;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendMailDataRequest;

/**
 * Service class for post.
 */
class EmployeeService implements EmployeeServiceInterface
{
    /**
     * post dao
     */
    private $employeeDao;

    /**
     * Class Constructor
     * @param PostDaoInterface
     */
    public function __construct(EmployeeDaoInterface $employeeDao)
    {
        $this->employeeDao = $employeeDao;
    }

    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index()
    {
        return $this->employeeDao->index();
    }

    /**
     * To store Employee data
     */
    public function store(StoreEmployeeRequest $request)
    {
        return $this->employeeDao->store($request);
    }

     /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        return $this->employeeDao->edit($id);
    }

    /**
     * Updating Process
     * @param EmployeeUpdateRequest $request
     * @param $id
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {
        return $this->employeeDao->update($request, $id);
    }

    /**
     * Delete Employee
     * @param $id
     */
    public function delete($id)
    {
        return $this->employeeDao->delete($id);
    }
}
