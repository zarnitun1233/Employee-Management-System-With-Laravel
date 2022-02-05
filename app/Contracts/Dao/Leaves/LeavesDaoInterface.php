<?php

namespace App\Contracts\Dao\Leaves;

use Illuminate\Http\Request;

interface LeavesDaoInterface
{
  /**
   *Home function to show leaves list
   * @param $name
   */
  public function index($name);

  /**
   * Create Function
   * @param Request $request
   */
  public function create(Request $request);

  /**
   *store data to table tables
   * @param Request $request
   * @return void
   */
  public function store(Request $request);

  /**
   *edit leaves
   * @param Request $request
   * @return void
   */
  public function edit($id);

  /**
   * Update function
   * @param Request $request
   */
  public function update(Request $request);

  /**
   *delete leaves;
   * @param Reuest $request
   * @return void
   */
  public function delete($id);

  /**
   *leave accepted by admin
   * @param [type] $id
   * @return void
   */
  public function accept($id);

  /**
   * Leaves Reason
   * @param $id
   */
  public function reason($id);

  /**
   * Leaves list by userId
   * @param Request $request
   */
  public function leavesByUser(Request $request);
}
