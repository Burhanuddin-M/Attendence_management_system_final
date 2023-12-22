<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Transaction;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function attendence()
    {
        $employees = Employee::with(['attendance' => function ($query) {
            $query->where('date', Carbon::now()->format('Y-m-d'));
        }])->get();
    
        // $CanHalfDay = Employee::with(['attendance' => function ($query) {
        //     $now = Carbon::now();
        //     $query->whereMonth('date', $now->month)
        //           ->whereYear('date', $now->year)
        //           ->where('is_half_day', 1);
        // }])->get();
    
   
    
        return view('attendence', compact('employees','CanHalfDay'));
    }
    



    public function attendencePost(Request $request, $id)
    {
        // Assuming you have an Employee model
        $employee = Employee::find($id);

        if (!$employee) {
            return redirect('attendence')->with('error', 'Employee not found');
        }

        $formattedDate = Carbon::now()->toDateString();

        if ($request->has('attendance')) {
            $attendance = Attendance::create([
                'employee_id' => $id,
                'type' => 'PRESENT',
                'date' => $formattedDate,
                'is_half_day' => $request->is_half_day,
                'extra_hours'=> $request->hours
            ]);
            if ($attendance->type == Attendance::PRESENT) {
                $employee_salary = $employee->salary_per_day;
                if ($request->has('hours') && !is_null($request->hours) && $request->hours > 0) {
                    $employee_salary = $employee_salary + (($employee->salary_per_day / 8) * $request->hours);
                }
                if ($attendance->is_half_day) {
                    $employee_salary = $employee_salary / 2;
                }
                Transaction::create(
                    [
                        'employee_id' => $employee->id,
                        'amount' => $employee_salary,
                        'type' => Transaction::CREDIT,
                        'note' => 'salary',
                    ]
                );
            }
        } else {
            $attendance = Attendance::create([
                'employee_id' => $id,
                'type' => 'ABSENT',
                'date' => $formattedDate,
            ]);
        }

        if ($request->has('withdraw') && !is_null($request->withdraw) && $request->withdraw > 0) {
            Transaction::create(
                [
                    'employee_id' => $employee->id,
                    'amount' => $request->withdraw,
                    'type' => Transaction::DEBIT,
                    'note' => 'withdraw',
                ]
            );
        }


        $message = $employee->name . ' attendance is updated';
        return redirect('attendence')->with('success', $message);
    }
}
