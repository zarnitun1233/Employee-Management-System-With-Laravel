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

    public function index(Request $request) {
        $leaves =  $this->leavesService->index();
        if($request->page !== null)
        {
            return view('backend.Leaves.leaves-list',compact('leaves'));
        }else{
            return redirect('/leaves/list?page=1');
        }

    }

    /**
    *create leaves;
    * @param Request $request
    * @return void
    */

    public function create( Request $request, $id )  {
        return view( 'frontend.Leaves.leaves-create' );
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
        return view('frontend.leaves.leaves-edit',compact('leave'));
    }

    /**
    *delete leaves;
    * @param Reuest $request
    * @return void
    */

    public function delete( Request $request, $id )  
    {
       $msg = $this->leavesService->delete($id);
       return redirect()->route('leaves.list')->with( 'msg', $msg );
    }

    /**
    *update leaves;
    * @param Reuest $request
    * @return void
    */

    public function update(StoreLeavesRequest $request)
    {
        $msg = $this->leavesService->update($request);
        echo "success";

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

        return view('frontend.leaves.leaves-reason',compact('leave'));
    }

    public function  searchByName(SearchLeavesRequest $request)
    {
        $employees = $this->leavesService->searchByName($request);
        return view('backend.leaves.leaves-search',compact('employees'));
    }
    
    public function leavesByUser(Request $request)
    { 
        $employees = $this->leavesService->leavesByUser($request);
        return view('frontend.leaves.leaves-by-user',compact('employees'));
    }
}
