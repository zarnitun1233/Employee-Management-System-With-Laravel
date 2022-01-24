<?php

namespace App\Http\Controllers\Leaves;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\Leaves\LeavesServiceInterface;
use  App\Http\Requests\Leaves\StorePostRequest;

class LeavesController extends Controller  {

    private $leavesService;

    public function __construct( LeavesServiceInterface $leavesService )  {
        $this->leavesService = $leavesService;
    }

    public function index() {
        $leaves =  $this->leavesService->index();
        return view('backend.Leaves.leaves-list',compact('leaves'));
    }

    /**
    * Undocumented function
    *create salaries;
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

    public function store( StorePostRequest $request )  {
        $msg = $this->leavesService->store( $request );
        return redirect()->route( 'leaves.create', [ $request->empId ] )->with( 'msg', $msg );
    }

    /**
    * Undocumented function
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
    * Undocumented function
    *delete leaves;
    * @param Reuest $request
    * @return void
    */

    public function delete( Request $request, $id )  
    {
       $msg = $this->leavesService->delete($id);
       return redirect()->route('leaves.list')->with( 'msg', $msg );
    }

    public function update(StorePostRequest $request)
    {
        $msg = $this->leavesService->update($request);
        echo "success";

    }

    public function accept(Request $request, $id)
    {
        $msg = $this->leavesService->accept($id);
        return redirect()->route('leaves.list')->with( 'msg', $msg );
    }
}
