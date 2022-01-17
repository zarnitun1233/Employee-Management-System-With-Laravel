<?php

namespace App\Services\Employee;

use App\Models\Employee;
use App\Contracts\Dao\Employee\EmployeeDaoInterface;
use App\Contracts\Services\Employee\EmployeeServiceInterface;
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
}
