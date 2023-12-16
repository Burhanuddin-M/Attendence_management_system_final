<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
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
    


public function attendencePost(Request $request, $id)
{
    // Assuming you have an Employee model
    $employee = Employee::find($id);

    if (!$employee) {   
        return redirect('attendence')->with('error', 'Employee not found');
    }

    $formattedDate = Carbon::now()->toDateString();

    $attendance = Attendance::create([
        'employee_id' => $id,
        'date' => $formattedDate,
    ]);    

    $message = $employee->name . ' attendance is updated';
    return redirect('attendence')->with('success', $message);
}


}
