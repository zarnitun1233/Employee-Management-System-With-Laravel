<?php

namespace App\Contracts\Services\Salary;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\SendMailDataRequest;

/**
 * Interface for post service
 */
interface SalaryServiceInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index();
}
