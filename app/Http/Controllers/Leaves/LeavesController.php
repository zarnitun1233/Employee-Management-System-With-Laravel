<?php

namespace App\Http\Controllers\Leaves;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\Leaves\LeavesServiceInterface;
use  App\Http\Requests\Leaves\StoreLeavesRequest;
use App\Http\Requests\Leaves\SearchLeavesRequest;

class LeavesController extends Controller  {

    private $leavesService;

    public function __construct( LeavesServiceInterface $leavesService )  {
        $this->leavesService = $leavesService;
    }

    public function index(Request $request,$name=null) {
        $leaves =  $this->leavesService->index($name);
       
        if ($request->page !== null) {
            return view('backend.Leaves.leaves-list',compact('leaves'));
        } else {
            $name =$name ? $name : '';
            return redirect('/leaves/list/'.$name.'?page=1');
        }
    }

    /**
    *create leaves;
    * @param Request $request
    * @return void
    */

    public function create( Request $request, $id )  {
        if(auth()->user()->id == $id){
            return view( 'frontend.Leaves.leaves-create' );
        }
        abort(403);
        
    }

    /**
    * Undocumented function
    *store data to table tables
    * @param Request $request
    * @return void
    */

    public function store( StoreLeavesRequest $request )  {
        $msg = $this->leavesService->store( $request );
        return redirect()->route( 'leaves.create', [ $request->empId ] )->with( 'msg', $msg );
    }

    /**
    *edit leaves
    * @param Request $request
    * @return void
    */

    public function edit( Request $request ,$id )  
    {   
      
        $leave = $this->leavesService->edit($id);
        if(auth()->user()->id == $leave->employee_id)
        {
            return view('frontend.leaves.leaves-edit',compact('leave'));
        }
        abort(404);
    }

    /**
    *delete leaves;
    * @param Reuest $request
    * @return void
    */

    public function delete( Request $request, $id )  
    {   
        $leave = $this->leavesService->delete($id);
        return redirect()->route('leaves.list')->with( 'msg', 'Leave Deleted Successfully');
    }

    /**
    *update leaves;
    * @param Reuest $request
    * @return void
    */

    public function update(StoreLeavesRequest $request)
    {
        if(auth()->user->id == $request->empId)
        {
            $msg = $this->leavesService->update($request);
            return redirect()->route( 'leaves.edit', [ $request->empId ] )->with( 'msg', 'leaves updated successfully' );
        }
        return abort(403);
    }

     /**
    *accept leaves by admin;
    * @param Reuest $request
    * @return void
    */

    public function accept(Request $request, $id)
    {
        $msg = $this->leavesService->accept($id);
        return redirect()->route('leaves.list')->with( 'msg', $msg );
    }


    public function reason(Request $request,$id)
    {
        $leave = $this->leavesService->reason($id);
        if(auth()->user()->id == $leave->employee_id || auth()->user()->role == 1)
        {
            return view('frontend.leaves.leaves-reason',compact('leave'));
        }
        abort(403);
       
    }


    public function  searchByName(SearchLeavesRequest $request)
    {
       return redirect('/leaves/list/'.$request->name.'');  
    }
    
    public function leavesByUser(Request $request)
    { 
        if(auth()->user()->id == $request->id || auth()->user()->role == 1)
        {
            $employees = $this->leavesService->leavesByUser($request);
            return view('frontend.leaves.leaves-by-user',compact('employees'));
        }
        abort(403);
    }
}
