<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendence;
use App\Models\Transaction;
use Carbon\Carbon;

class MyController extends Controller
{


    public function index()
    {
        return view('index');
    }

    public function deposits()
    {
        $Employees = Employee::all();
        return view('deposits', compact('Employees'));
    }

    public function post_deposits(Request $request, $id)
    {

        $amount = $request->amount;
        $message = $request->message." - ".$amount;


        $transaction = Transaction::create([
            'employee_id' => $id,
            'amount' => $amount,
            'type' => "DEPOSIT",
            'note' => $message,
        ]);



        $Employee = Employee::find($id);
        $portfolio_amount = $Employee->amount_portfolio;
        $Employee->amount_portfolio = $portfolio_amount + $amount;
        $Employee->save();

        $Message = $Employee->name . " was deposited the amount of " . $amount;

        return redirect('deposits')->with('success', $Message);
    }

    public function showreport()
    {
        $Employees = Employee::all();
        return view('report', compact('Employees'));
    }

    public function specificreport($id)
    {
        $MyEmployee = Employee::find($id);
        return view('specificreport', compact('MyEmployee'));
    }

    
    public function finalreport($id,request $request)
    {
        $date = $request->date;
        $start_date = Carbon::parse($date)->startOfMonth();
        $end_date = Carbon::parse($date)->endOfMonth();
        $employeeData = Employee::find($id);

        $attendance = Attendance::where('employee_id', $id)
            ->whereDate('date', '>=', $start_date)
            ->whereDate('date', '<=', $end_date)
            ->orderBy('date', 'asc')
            ->get();

        $total_overtime = $attendance->sum('extra_hours');

        return view('finalreport', [
            'employeeData'=>$employeeData,
            'attendance' => $attendance->toArray(),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'total_overtime' => $total_overtime,
        ]);
    }
}
