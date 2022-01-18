<?php

namespace App\Dao\Salary;

use App\Models\Employee;
use App\Models\Major;
use App\Contracts\Dao\Salary\SalaryDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SendMailDataRequest;

/**
 * Data accessing object for post
 */
class SalaryDao implements SalaryDaoInterface
{
    /**
     * Home Page Function to show data
     * Search Function
     * @param Request
     */
    public function index()
    {
        return "Hello";
    }
}
