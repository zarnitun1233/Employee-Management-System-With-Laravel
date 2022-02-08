<?php

namespace App\Http\Controllers\Leaves;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Services\Leaves\LeavesServiceInterface;
use  App\Http\Requests\Leaves\StoreLeavesRequest;
use App\Http\Requests\Leaves\SearchLeavesRequest;

class LeavesController extends Controller
{

    private $leavesService;

    public function __construct(LeavesServiceInterface $leavesService)
    {
        $this->leavesService = $leavesService;
    }

    public function index(Request $request) {
        $name = $request->name;
        $link = [];
        $name ? $link['name'] = $name : null;
        $link['page'] = '1';
        $leaves =  $this->leavesService->index($name ?? null);
        if ($request->page !== null) {
            return view('backend.Leaves.leaves-list')->with('leaves', $leaves);
        }
        return redirect()->route('leaves-list',$link);
        
    }

    /**
     *create leaves;
     * @param Request $request
     * @return void
     */

    public function create(Request $request, $id)
    {
        return view('frontend.Leaves.leaves-create');
    }

    /**
     * Undocumented function
     *store data to table tables
     * @param Request $request
     * @return void
     */

    public function store(StoreLeavesRequest $request)
    {
        $msg = $this->leavesService->store($request);
        return redirect()->route('leaves-create', [$request->empId])->with('msg', $msg);
    }

    /**
     *edit leaves
     * @param Request $request
     * @return void
     */

    public function edit(Request $request, $id)
    {   
        $leave = $this->leavesService->edit($id);
        $leave = ''.$leave->employee_id.'' === ''.auth()->user()->id.'' ? $leave : null;
        if($leave) {
            return view('frontend.leaves.leaves-edit')->with('leave', $leave);
        }
        abort(403);
    }

    /**
     *delete leaves;
     * @param Reuest $request
     * @return void
     */

    public function delete(Request $request, $id)
    {   
        if(auth()->user()->role === '1') {
            $msg = $this->leavesService->delete($id);
            return redirect()->route('leaves-list')->with('msg', $msg);
        } elseif (''.auth()->user()->id.'' === ''.$request->id.'') {
            $msg = $this->leavesService->delete($id);
            return redirect()->back();
        }
        abort(403);
    }

    /**
     *update leaves;
     * @param Request $request
     * @return void
     */

    public function update(StoreLeavesRequest $request)
    {
        if(''.auth()->user()->id.'' === ''.$request->empId.'')
        {
            $msg = $this->leavesService->update($request);
            return redirect()->back()->with('msg', 'leaves updated successfully');
        }
        abort(403);
    }

    /**
     *accept leaves by admin;
     * @param Reuest $request
     * @return void
     */

    public function accept(Request $request, $id)
    {
        $msg = $this->leavesService->accept($id);
        return redirect()->route('leaves-list')->with('msg', $msg);
    }


    public function reason(Request $request, $id)
    {
        $leave = $this->leavesService->reason($id);

        return view('frontend.leaves.leaves-reason')->with('leave', $leave);
    }


    public function searchByName(SearchLeavesRequest $request)
    {
        return redirect()->route('leaves-list',['name'=>$request->name]);
    }

    public function leavesByUser(Request $request)
    {
        $employees = $this->leavesService->leavesByUser($request);
        return view('frontend.leaves.leaves-by-user')->with('employees', $employees);
    }
}
