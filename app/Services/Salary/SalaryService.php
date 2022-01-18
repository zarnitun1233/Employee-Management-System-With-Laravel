<?php

namespace App\Services\Salary;

use App\Models\Employee;
use App\Contracts\Dao\Salary\SalaryDaoInterface;
use App\Contracts\Services\Salary\SalaryServiceInterface;
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
     * post dao
     */
    private $salaryDao;

    /**
     * Class Constructor
     * @param PostDaoInterface
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
}
