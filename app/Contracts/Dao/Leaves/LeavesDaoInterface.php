<?php

namespace App\Contracts\Dao\Leaves;
use Illuminate\Http\Request;

interface LeavesDaoInterface
{
  /**
   * Undocumented function
   *send empoyee data to salaries create view
   * @return void
   */
  public function index($name);

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

  /**
   * Undocumented function
   *leave accepted by admin
   * @param [type] $id
   * @return void
   */
  public function accept($id);

  public function reason($id);

  public function leavesByUser(Request $request);
}