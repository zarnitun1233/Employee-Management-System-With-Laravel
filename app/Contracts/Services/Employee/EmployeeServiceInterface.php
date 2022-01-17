<?php

namespace App\Contracts\Services\Employee;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\SendMailDataRequest;

/**
 * Interface for post service
 */
interface EmployeeServiceInterface
{
    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index();
}
