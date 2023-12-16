<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendence;
use App\Models\Transaction;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function attendence(){
        $employees = Employee::all();
        
        $attendances = $employees->load('attendance');
        
        $status = $attendances->map(function ($employee) {
            return $employee->attendance->firstWhere('date', Carbon::now()->format('Y-m-d'));
        });
    
        return view('attendence', compact('employees', 'status'));
    }
    
    
    
    
    

    public function attendencePost(Request $request,$id){

        dd($request->all());

        $Message = $request->name." attendence is Updated";
        return redirect('attendence')->with('success',$Message);
    }
}
