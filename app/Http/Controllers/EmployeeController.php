<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendence;
use App\Models\Transaction;

class EmployeeController extends Controller
{
    public function AddEmployee(){
        $Employees = Employee::all();
        return view('addEmployee',compact('Employees'));
    }

    public function PostAddEmployee(Request $request){
        $request->validate([
            'name'=>'required',
            'contact_no'=>'required',
            'salary_per_day'=>'required'
        ]);

        $Employee = new Employee();

        $Employee->name = $request->name;
        $Employee->contact_no = $request->contact_no;
        $Employee->salary_per_day = $request->salary_per_day;

        $Employee->save();

        $Message = $request->name." is added Successfully";

        return redirect('addEmployee')->with('success',$Message);
    }

    public function PostEditEmployee(Request $request,$id)
{


    $request->validate([
        'name' => 'required',
        'contact_no' => 'required',
        'salary_per_day' => 'required'
    ]);

    $employee = Employee::find($id);

    $employee->update([
        'name' => $request->name,
        'contact_no' => $request->contact_no,
        'salary_per_day' => $request->salary_per_day,
    ]);

    return redirect('addTable')->with('success',"Employee is added Successfully");
   
    
}


    

    // public function masterTable(){

    //     $Employees = Employee::all();
    //     return view('masterTable',compact('Employees'));
    // }

    public function masterTable(){

        $Employees = Employee::with('attendance')->get();



        return view('masterTable',compact('Employees'));
    }

   
    
    
}
