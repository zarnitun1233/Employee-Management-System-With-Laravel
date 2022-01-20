<?php

namespace App\Services\Leaves;

use Illuminate\Http\Request;
use App\Contracts\Services\Leaves\LeavesServiceInterface;
use App\Contracts\Dao\Leaves\LeavesDaoInterface;



class LeavesService implements LeavesServiceInterface
{

  private $leavesDao;

  /**
  * Undocumented function
  *send empoyee data to salaries create view
  * @return void
  */

  public function __construct(LeavesDaoInterface $leavesDao)
  {
    $this->leavesDao = $leavesDao;
  }

  public function index()
  {
    return $this->leavesDao->index();
  }

  /**
  * Undocumented function
  *create salaries;
  * @param Request $request
  * @return void
  */

  public function create( Request $request )
  {

  }

  /**
  * Undocumented function
  *store data to table tables
  * @param Request $request
  * @return void
  */

  public function store( Request $request )
  {
     return $this->leavesDao->store($request);
  }

  /**
  * Undocumented function
  *edit leaves
  * @param Request $request
  * @return void
  */

  public function edit($id)
  {
    return $this->leavesDao->edit($id);
  }

  public function update(Request $request)
  {
    return $this->leavesDao->update($request);
  }

  /**
  * Undocumented function
  *delete leaves;
  * @param Reuest $request
  * @return void
  */

  public function delete($id)
  {
    return $this->leavesDao->delete($id);
  }

  public function accept($id)
  {
    return $msg = $this->leavesDao->accept($id);
  }
}