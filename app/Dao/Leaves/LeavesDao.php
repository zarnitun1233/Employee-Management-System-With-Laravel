<?php

namespace App\Dao\Leaves;

use App\Contracts\Dao\Leaves\LeavesDaoInterface;
use Illuminate\Http\Request;
use App\Models\Leave;
use Illuminate\Support\Facades\DB;

class LeavesDao implements  LeavesDaoInterface
 {
    /**
    *send empoyee data to salaries create view
    * @return void
    */

    public function index()
    {
      return $leaves = Leave::paginate(5);
    }
    /**
     * 
     * we will update in furture
     *
     * @param Request $request
     * @return void
     */
    public function create( Request $request )
    {
      
    }

    /**
    *store data to table
    * @param Request $request
    * @return void
    */

    public function store( Request $request )
    {
      $leave = new Leave;
      $leave->fromDate =$request->fromDate;
      $leave->toDate =$request->toDate;
      $leave->duration = $request->duration;
      $leave->reason =  $request->reason;
      $leave->employee_id = $request->empId;
      $leave->save();
      $msg = "success";
      return $msg;
    }

    /**
     * find leave id to update
     * need to check other conditions
     * @param [type] $id
     * @return void
     */
    public function edit($id)
    {
      return $leave = Leave::find($id);
    }

    /**
     * update leave by user
     *
     * @param Request $request
     * @return void
     */

    public function update(Request $request)
    {
        $leaveId = $request->id;
        $empId = $request->empId;
        $fromDate =$request->fromDate;
        $toDate = $request->toDate;
        $reason = $request->reason;
        $duration = $request->duration;
        DB::table('leaves')
            ->where('id','=',$leaveId)
            ->where('employee_id','=',$empId)
            ->update([
              'fromDate' => $fromDate,
              'toDate'   => $toDate,
              'reason'   => $reason,
              'duration' => $duration,
            ]);
          $msg = 'updated success';
          return $msg;
    }

    /**
    * Undocumented function
    *delete leaves;
    * @param [type] $id
    * @return void
    */

    public function delete($id)
    {  
      DB::table('leaves')
      ->where('id', '=',$id)
      ->update(['status' => 0]);
      Leave::destroy($id);
       $msg = 'Successfullu Deleted';
       return $msg;
    }

    /**
     * accept leaves by admin
     *
     * @param [type] $id
     * @return void
     */

    public function accept($id)
    {
      DB::table('leaves')
      ->where('id', '=',$id)
      ->update(['status' => 1]);
      $msg = 'leave Accepted:)';
      return $msg;
    }

    public function reason($id)
    {
      return $leave = Leave::find($id);
    }

    public function  searchByName(Request $request)
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
      ->where('employees.name','LIKE','%'.$request->name.'%')
      ->get();
      return  $employees;
    }

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
      ->get();
      return  $employees;
    }
}
