<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
class TransactionController extends Controller
{
    public function store(Request $request){
        $user=request()->user();
        Transaction::create([
            'user_id'   => $user['id'],
            'car_id'    => $request->car_id,
            'start_date'    => $request->start_date,
            'end_date'    => $request->end_date,
            'status'    =>1
        ]);

        return response()->json([
            'status'    => 200,
            'message'   => 'berhasil'
        ]);
    }

    public function index(){
        $user=request()->user();
        $transactions=Transaction::where('user_id',$user['id'])
        ->select('transactions.*','transaction_statuses.name as status_name')
        ->join('transaction_statuses','transaction_statuses.id','=','transactions.status')
        ->with('car')->get();
        return $transactions;
    }
}
