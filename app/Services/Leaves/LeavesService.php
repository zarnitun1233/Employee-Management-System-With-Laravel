<?php

namespace App\Services\Leaves;

use Illuminate\Http\Request;
use App\Contracts\Services\Leaves\LeavesServiceInterface;
use App\Contracts\Dao\Leaves\LeavesDaoInterface;



class LeavesService implements LeavesServiceInterface
{

  /**
   * Leaves dao
   */
  private $leavesDao;

  /**
   * Class Constructor
   * @param LeavesDaoInterface
   */
  public function __construct(LeavesDaoInterface $leavesDao)
  {
    $this->leavesDao = $leavesDao;
  }

  /**
   *Home function to show leaves list
   * @param $name
   */
  public function index($name)
  {
    return $this->leavesDao->index($name);
  }

  /**
   * Create Function
   * @param Request $request
   */
  public function create(Request $request)
  {
  }

  /**
   *store data to table tables
   * @param Request $request
   * @return void
   */
  public function store(Request $request)
  {
    return $this->leavesDao->store($request);
  }

  /**
   *edit leaves
   * @param Request $request
   * @return void
   */
  public function edit($id)
  {
    return $this->leavesDao->edit($id);
  }

  /**
   * Update function
   * @param Request $request
   */
  public function update(Request $request)
  {
    return $this->leavesDao->update($request);
  }

  /**
   *delete leaves;
   * @param Reuest $request
   * @return void
   */
  public function delete($id)
  {
    return $this->leavesDao->delete($id);
  }

  /**
   *leave accepted by admin
   * @param [type] $id
   * @return void
   */
  public function accept($id)
  {
    return $msg = $this->leavesDao->accept($id);
  }

  /**
   * Leaves Reason
   * @param $id
   */
  public function reason($id)
  {
    return  $this->leavesDao->reason($id);
  }

  /**
   * Leaves list by userId
   * @param Request $request
   */
  public function leavesByUser(Request $request)
  {
    return $employees = $this->leavesDao->leavesByUser($request);
  }
}
