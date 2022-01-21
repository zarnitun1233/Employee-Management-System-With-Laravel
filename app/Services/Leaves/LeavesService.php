<?php

namespace App\Services\Leaves;

use Illuminate\Http\Request;
use App\Contracts\Services\Leaves\LeavesServiceInterface;
use App\Contracts\Dao\Leaves\LeavesDaoInterface;



class LeavesService implements LeavesServiceInterface
{

  private $leavesDao;

  /**
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
  *create  leaves;
  *we will update other feature in furture
  * @param Request $request
  * @return void
  */

  public function create( Request $request )
  {

  }

  /**
  *store data to table tables
  * @param Request $request
  * @return void
  */

  public function store( Request $request )
  {
     return $this->leavesDao->store($request);
  }

  /**
  *edit leaves
  * @param $id
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
  * @param  $id
  * @return void
  */

  public function delete($id)
  {
    return $this->leavesDao->delete($id);
  }

  /**
  *accept leaves by admin;
  * @param  $id
  * @return void
  */

  public function accept($id)
  {
    return $msg = $this->leavesDao->accept($id);
  }
}