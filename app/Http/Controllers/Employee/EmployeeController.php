<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Employee\EmployeeServiceInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * employeeInterface
     */
    private $employeeInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(EmployeeServiceInterface $employeeServiceInterface)
    {
        $this->employeeInterface = $employeeServiceInterface;
    }

    /**
     * Home Page to show employee list
     */
    public function index()
    {
        $this->employeeInterface->index();
        return view('frontend.employee.index');
    }

    /**
     * To create Employee
     */
    public function create()
    {
        return view('backend.employee.create');
    }
}
