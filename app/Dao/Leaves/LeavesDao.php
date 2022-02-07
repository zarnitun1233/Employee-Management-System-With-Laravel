<?php

namespace App\Dao\Leaves;

use App\Contracts\Dao\Leaves\LeavesDaoInterface;
use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class LeavesDao implements LeavesDaoInterface
{
  /**
   *Home function to show leaves list
   * @param $name
   */
  public function index($name)
  {
    $leaves = DB::table('leaves')
      ->select(
        'employees.name as emp_name',
        'departments.name as department_name',
        'leaves.*'
      )
      ->join('employees', 'employees.id', 'leaves.employee_id')
      ->join('departments', 'departments.id', 'employees.department_id');

    $leaves = $name ? $leaves->where('employees.name', 'LIKE', '%' . $name . '%') : $leaves;

    return $leaves->paginate(5);
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
    $leave = new Leave;
    $leave->fromDate = $request->fromDate;
    $leave->toDate = $request->toDate;
    $leave->duration = $request->duration;
    $leave->reason =  $request->reason;
    $leave->employee_id = $request->empId;
    $leave->save();
    $msg = "success";
    return $msg;
  }

  /**
   *edit leaves
   * @param Request $request
   * @return void
   */
  public function edit($id)
  {
    return $leave = Leave::find($id);
  }

  /**
   * Update function
   * @param Request $request
   */
  public function update(Request $request)
  {
    $leaveId = $request->id;
    $empId = $request->empId;
    $fromDate = $request->fromDate;
    $toDate = $request->toDate;
    $reason = $request->reason;
    $duration = $request->duration;
    DB::transaction(function ($leaveId, $empId, $fromDate, $toDate, $reason, $duration) {
      DB::table('leaves')
      ->where('id', '=', $leaveId)
      ->where('employee_id', '=', $empId)
      ->update([
        'fromDate' => $fromDate,
        'toDate'   => $toDate,
        'reason'   => $reason,
        'duration' => $duration,
      ]);
  });
  
    $msg = 'updated success';
    return $msg;
  }

  /**
   *delete leaves;
   * @param Reuest $request
   * @return void
   */
  public function delete($id)
  {
    DB::transaction(function ($id) {
      DB::table('leaves')
      ->where('id', '=', $id)
      ->update(['status' => 0]);
  });
  
    Leave::destroy($id);
    $msg = 'Successfullu Deleted';
    return $msg;
  }

  /**
   *leave accepted by admin
   * @param [type] $id
   * @return void
   */
  public function accept($id)
  {
    DB::transaction(function ($id) {
      DB::table('leaves')
      ->where('id', '=', $id)
      ->update(['status' => 1]);
  });
  
    $msg = 'leave Accepted:)';
    return $msg;
  }

  /**
   * Leaves Reason
   * @param $id
   */
  public function reason($id)
  {
    return $leave = Leave::find($id);
  }

  /**
   * Leaves list by userId
   * @param Request $request
   */
  public function leavesByUser(Request $request)
  {
    $employees = DB::table('employees')
      ->select(
        'employees.name as emp_name',
        'leaves.id as leave_id',
        'leaves.reason as leave_reason',
        'leaves.fromDate as leave_fromDate',
        'leaves.reason as leave_reason',
        'leaves.status as leave_status',
        'leaves.toDate as leave_toDate',
        'leaves.duration as leave_duration',
        'departments.name as department_name'
      )
      ->join('leaves','employees.id','=','leaves.employee_id')
      ->join('departments','employees.department_id','=','departments.id')
      ->where('employees.id','=',$request->id)  
      ->where('leaves.deleted_at','=',null)
      ->get();
    return  $employees;
  }
}
