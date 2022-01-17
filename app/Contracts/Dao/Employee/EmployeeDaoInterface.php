<?php

namespace App\Contracts\Dao\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\SendMailDataRequest;

/**
 * Interface for Data Accessing Object of Post
 */
interface EmployeeDaoInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index();
}
