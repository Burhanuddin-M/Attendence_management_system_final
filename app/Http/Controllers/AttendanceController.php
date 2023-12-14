<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendence;
use App\Models\Transaction;

class AttendanceController extends Controller
{
    public function attendence(){
        $Employees = Employee::all();
            return view('attendence',compact('Employees'));
    }

    public function attendencePost(Request $request,$id){


        $Message = $request->name." attendence is Updated";
        return redirect('attendence')->with('success',$Message);
    }
}
