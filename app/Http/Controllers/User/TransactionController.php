<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransferAmountRequest;
use App\Http\Requests\WithdrawDepositeRequest;
use App\Models\TransactionHistory;
use App\Repositories\TransactionRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DataTables;

class TransactionController extends Controller
{
    private $transactionRepository;
    public function __construct(TransactionRepository $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function deposit()
    {
        return view('deposit');
    }

    public function depositAmount(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $result = $this->transactionRepository->createDeposite($request->all());
            DB::commit();
            return response()->json([
                'status' => true,
                'message'    => 'Amount deposited successfully'
            ], 200);
        } catch (Exception $e) {
            logger()->error($e);
            return response()->json([
                'status' => false,
                'message'    => 'Something went wrong'
            ], 500);
        }
    }

    public function withdraw()
    {
        return view('withdraw');
    }

    public function withdrawAmount(WithdrawDepositeRequest $request)
    {
        try {
            DB::beginTransaction();
            $result = $this->transactionRepository->withdrawDeposite($request->all());
            DB::commit();
            return response()->json([
                'status' => true,
                'message'    => 'Amount withdrawn successfully'
            ], 200);
        } catch (Exception $e) {
            logger()->error($e);
            return response()->json([
                'status' => false,
                'message'    => 'Something went wrong... please try again'
            ], 500);
        }
    }

    public function  transfer()
    {
        return view('transfer');
    }

    public function transferAmount(TransferAmountRequest $request)
    {
        try {
            DB::beginTransaction();
            $result = $this->transactionRepository->transferAmount($request->all());
            DB::commit();
            return response()->json([
                'status' => true,
                'message'    => 'Amount transferred successfully'
            ], 200);
        } catch (Exception $e) {
            logger()->error($e);
            return response()->json([
                'status' => false,
                'message'    => 'Something went wrong... please try again'
            ], 500);
        }
    }

    public function statement(){

        return view('statement');
    }

    public function getTransactionData() {
        $fundRequest_list = TransactionHistory::where('user_id',Auth::user()->id);

    return DataTables::of($fundRequest_list)
            ->addIndexColumn()
            ->addColumn('date', function($row){
                return $row->created_at->format('d-m-Y h:i A');
            })
            ->addColumn('type', function($row){
                
                if($row->type == config('bank.transaction_type.debit')){
                    return 'Debit';
                } elseif ($row->type == config('bank.transaction_type.credit')){
                    return 'Credit';
                }
            })->make(true); 
    }
   
}
