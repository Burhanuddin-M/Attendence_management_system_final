<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendence;
use App\Models\Transaction;


class MyController extends Controller
{
    

public function index(){
    return view('index');
}

public function deposits(){
    $Employees = Employee::all();
        return view('deposits',compact('Employees'));
}

public function post_deposits(Request $request,$id){

    $amount = $request->amount;
    $message = $request->message;


    $transaction = Transaction::create([
        'employee_id' => $id,
        'amount' => $amount,
        'type' => "DEBIT",
        'note' => $message,
    ]);
    


    $Employee = Employee::find($id);
    $portfolio_amount = $Employee->amount_portfolio;
    $Employee->amount_portfolio = $portfolio_amount + $amount;
    $Employee->save();

    $Message = $Employee->name ." was deposited the amount of ".$amount;

    return redirect('deposits')->with('success',$Message);
}

public function showreport(){
    $Employees = Employee::all();
    return view('report',compact('Employees'));
}

public function specificreport($id){
    $MyEmployee = Employee::find($id);
    return response()->json(compact('employee'));
}


}
