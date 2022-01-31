<?php

namespace App\Services\Department;

use App\Models\Department;
use App\Contracts\Dao\Department\DepartmentDaoInterface;
use App\Contracts\Services\Department\DepartmentServiceInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Mail\TestMail;
use App\Mail\sendMailData;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendMailDataRequest;

/**
 * Service class for post.
 */
class DepartmentService implements DepartmentServiceInterface
{
    /**
     * post dao
     */
    private $departmentDao;

    /**
     * Class Constructor
     * @param PostDaoInterface
     */
    public function __construct(DepartmentDaoInterface $departmentDao)
    {
        $this->departmentDao = $departmentDao;
    }

    /**
     * Home Page Function to show data
     * @param Request
     */
    public function index()
    {
        return $this->departmentDao->index();
    }

    /**
     * To create Department
     */
    public function create()
    {
        return $this->departmentDao->create();
    }

    /**
     * To store Department data
     */
    public function store(StoreDepartmentRequest $request)
    {
        return $this->departmentDao->store($request);
    }

     /**
     * To show edit form
     * @param $id
     */
    public function edit($id)
    {
        return $this->departmentDao->edit($id);
    }

    /**
     * Updating Process
     * @param DepartmentUpdateRequest $request
     * @param $id
     */
    public function update(DepartmentUpdateRequest $request, $id)
    {
        return $this->departmentDao->update($request, $id);
    }

    /**
     * Delete Department
     * @param $id
     */
    public function delete($id)
    {
        return $this->departmentDao->delete($id);
    }
}