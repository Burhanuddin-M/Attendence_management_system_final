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
            'type' => 'PRESENT',
            'date' => $formattedDate,
        ]);


        if ($attendance->type == Attendance::PRESENT) {
            $employee_salary = $employee->salary_per_day;
            if ($request->has('hours') && !is_null($request->hours) && $request->hours > 0) {
                $employee_salary = $employee_salary + (($employee->salary_per_day / 8) + $request->hours);
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
