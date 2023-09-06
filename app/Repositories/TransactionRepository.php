<?php

namespace App\Repositories;

use App\Models\TransactionHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionRepository
{

    public function createDeposite($data)
    {
        $userID = Auth::user()->id;
        $deposite = User::find($userID);
        $deposite->balance = $deposite->balance + $data['amount'];
        $deposite->save();

        $transaction = new TransactionHistory();
        $transaction->user_id = $userID;
        $transaction->to_user = $userID;
        $transaction->type = config('bank.transaction_type.credit');
        $transaction->amount = $data['amount'];
        $transaction->balance = $deposite->balance;
        $transaction->date =  Carbon::now();
        $transaction->details = "Deposit";
        $transaction->created_by = $userID;
        $transaction->updated_by = $userID;
        $transaction->save();
        return true;
    }

    public function withdrawDeposite($data)
    {
        $userID = Auth::user()->id;
        $deposite = User::find($userID);
        $deposite->balance = $deposite->balance - $data['amount'];
        $deposite->save();

        $transaction = new TransactionHistory();
        $transaction->user_id = $userID;
        $transaction->to_user = $userID;
        $transaction->type = config('bank.transaction_type.debit');
        $transaction->amount = $data['amount'];
        $transaction->balance = $deposite->balance;
        $transaction->date =  Carbon::now();
        $transaction->details = "Withdraw";
        $transaction->created_by = $userID;
        $transaction->updated_by = $userID;
        $transaction->save();
        return true;
    }

    public function transferAmount($data)
    {
        $userID = Auth::user()->id;
        $deposite = User::find($userID);
        $deposite->balance = $deposite->balance - $data['amount'];
        $deposite->save();

        $transferredTo = User::select('id','name','email','balance')->where('email', $data['email'])->first();
        $transferredTo->balance = $transferredTo->amount + $data['amount'];
        $transferredTo->save();

        $transaction = new TransactionHistory();
        $transaction->user_id = $userID;
        $transaction->to_user = $transferredTo->id;
        $transaction->type = config('bank.transaction_type.debit');
        $transaction->amount = $data['amount'];
        $transaction->balance = $deposite->balance;
        $transaction->date =  Carbon::now();
        $transaction->details = "transfered to ". $transferredTo->name;
        $transaction->created_by = $userID;
        $transaction->updated_by = $userID;
        $transaction->save();


        $transaction = new TransactionHistory();
        $transaction->user_id = $transferredTo->id;
        $transaction->to_user = $userID;
        $transaction->type = config('bank.transaction_type.credit');
        $transaction->amount = $data['amount'];
        $transaction->balance =  $transferredTo->balance;
        $transaction->date =  Carbon::now();
        $transaction->details = "transfer from " . Auth::user()->name;
        $transaction->created_by =  $userID;
        $transaction->updated_by = $userID;
        $transaction->save();
        return true;
    }

    
}
