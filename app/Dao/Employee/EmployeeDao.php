<?php

namespace App\Dao\Employee;

use App\Models\Employee;
use App\Models\Major;
use App\Contracts\Dao\Employee\EmployeeDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SendMailDataRequest;

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
        return "Hello";
    }
}
