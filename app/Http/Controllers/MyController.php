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

public function allowance(){
    $Employees = Employee::all();
        return view('allowance',compact('Employees'));
}

public function post_allowance(Request $request,$id){
    $Employee = Employee::find($id);

    $portfolio_amount = $Employee->amount_portfolio;
    $amount = $request->amount;
    $Employee->amount_portfolio = $portfolio_amount - $amount;

    $Employee->save();

    $Message = $Employee->name ." was taken the amount of ".$amount;

    return redirect('allowance')->with('success',$Message);
}



}
