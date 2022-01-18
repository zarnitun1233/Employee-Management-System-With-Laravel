<?php

namespace App\Http\Controllers\Salary;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Salary\SalaryServiceInterface;
use Illuminate\Http\Request;
use App\Models\Salary;

class SalaryController extends Controller
{
    /**
     * employeeInterface
     */
    private $salaryInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(SalaryServiceInterface $salaryServiceInterface)
    {
        $this->salaryInterface = $salaryServiceInterface;
    }

    /**
     * Home Page
     */
    public function index()
    {
        //$salaries = $this->salaryInterface->index();
        //return redirect("/salary/list")->with('salaries', $salaries);
        return view("frontend.salary.index");
    }
}
