<?php

namespace App\Services\Salary;

use App\Models\Employee;
use App\Contracts\Dao\Salary\SalaryDaoInterface;
use App\Contracts\Services\Salary\SalaryServiceInterface;
use App\Http\Requests\StoreSalaryRequest;
use App\Http\Requests\SalaryUpdateRequest;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Mail\TestMail;
use App\Mail\sendMailData;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendMailDataRequest;

/**
 * Service class for post.
 */
class SalaryService implements SalaryServiceInterface
{
    /**
     * Salary dao
     */
    private $salaryDao;

    /**
     * Class Constructor
     * @param SalaryDaoInterface
     */
    public function __construct(SalaryDaoInterface $salaryDao)
    {
        $this->salaryDao = $salaryDao;
    }

    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index()
    {
        return $this->salaryDao->index();
    }

    /**
     * To store Salary data
     */
    public function store(StoreSalaryRequest $request)
    {
        return $this->salaryDao->store($request);
    }

     /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        return $this->salaryDao->edit($id);
    }

    /**
     * Updating Process
     * @param SalaryUpdateRequest $request
     * @param $id
     */
    public function update(SalaryUpdateRequest $request, $id)
    {
        return $this->salaryDao->update($request, $id);
    }

    /**
     * Delete Salary
     * @param $id
     */
    public function delete($id)
    {
        return $this->salaryDao->delete($id);
    }
}
