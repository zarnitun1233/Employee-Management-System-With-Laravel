<?php

namespace App\Contracts\Services\Leaves;

use Illuminate\Http\Request;

interface LeavesServiceInterface
{
  /**
   * Undocumented function
   *send empoyee data to salaries create view
   * @return void
   */
  public function index();

  /**
   * Undocumented function
   *create salaries;
   * @param Request $request
   * @return void
   */
  public function create(Request $request);

  /**
   * Undocumented function
   *store data to table tables
   * @param Request $request
   * @return void
   */
  public function store(Request $request);

  /**
   * Undocumented function
   *edit leaves
   * @param Request $request
   * @return void
   */
  public function edit($id);

  public function update(Request $request);
  /**
   * Undocumented function
   *delete leaves;
   * @param Reuest $request
   * @return void
   */
  public function delete($id);
  
  public function accept($id);

  public function reason($id);

  public function  searchByName(Request $request);

  public function leavesByUser(Request $request);
}