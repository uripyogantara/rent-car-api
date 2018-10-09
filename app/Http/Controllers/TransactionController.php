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
}
