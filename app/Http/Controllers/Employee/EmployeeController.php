<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Contracts\Services\Employee\EmployeeServiceInterface;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use ImageResize;
use App\Image;

class EmployeeController extends Controller
{
    /**
     * employeeInterface
     */
    private $employeeInterface;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(EmployeeServiceInterface $employeeServiceInterface)
    {
        $this->employeeInterface = $employeeServiceInterface;
    }

    /**
     * Home Page to show employee list
     */
    public function index()
    {
        $this->employeeInterface->index();
        return view('frontend.employee.index');
    }

    /**
     * To create Employee
     */
    public function create()
    {
        return view('backend.employee.create');
    }

    /**
     * To store Employee data
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->position = $request->position;
        $employee->role = $request->role;
        $employee->age = $request->age;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $newImageName = time() . '-' . $request->name . '-' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $employee->image = $newImageName;
//        $image = $request->file('image');
//        $input['imagename'] = time().'.'.$image->extension();
//      
//        $destinationPath = public_path('/thumbnail');
//        $img = ImageResize::make($image->path());
//        $img->resize(100, 100, function ($constraint) {
//            $constraint->aspectRatio();
//        })->save($destinationPath.'/'.$input['imagename']);
//    
//        $destinationPath = public_path('/image');
//        $image->move($destinationPath, $input['imagename']);
//  
// Image::create(['image' => $input['imagename'], 'thumbnail' => $input['imagename']]);
//  
//        return back()
//            ->with('success','Successfully Save Your Image file')
//            ->with('imageName',$input['imagename']);
        $employee->phone = $request->phone;
        $employee->dob = $request->dob;
        $employee->address = $request->address;
        $employee->department_id = $request->department_id;
        $employee->save();
    }
}
