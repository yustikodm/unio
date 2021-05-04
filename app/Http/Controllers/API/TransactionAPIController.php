<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTransactionAPIRequest;
use App\Http\Requests\API\UpdateTransactionAPIRequest;
use App\Models\Transaction;
use App\Models\Family;
use App\User;
use App\Models\PointLog;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\TransactionResource;
use Response;
use Illuminate\Support\Facades\DB;

/**
 * Class TransactionController
 * @package App\Http\Controllers\API
 */

class TransactionAPIController extends AppBaseController
{
    /** @var  TransactionRepository */
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the Transaction.
     * GET|HEAD /transactions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Transaction::query()->where('user_id', $request->input('user_id'))->with('user');
        return $this->sendResponse($query->paginate(10), 'Transactions retrieved successfully');
    }

    /**
     * Store a newly created Transaction in storage.
     * POST /transactions
     *
     * @param CreateTransactionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionAPIRequest $request)
    {
        $input = $request->only([
            'user_id',
            'code',
            'grand_total',
            'status',
        ]);

        $transaction = $this->transactionRepository->create($input);

        return $this->sendResponse(new TransactionResource($transaction), 'Transaction saved successfully');
    }

    /**
     * Display the specified Transaction.
     * GET|HEAD /transactions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Transaction $transaction */
        $transaction = Transaction::query()->where('id', $id)->with('user')->first();
        $detailTrx = DB::table('transaction_details')->where('transaction_id', $id)->get();
        $transaction->detail = $detailTrx;

        if (empty($transaction)) {
            return $this->sendError('Transaction not found');
        }

        return $this->sendResponse($transaction, 'Transaction retrieved successfully');
    }

    /**
     * Update the specified Transaction in storage.
     * PUT/PATCH /transactions/{id}
     *
     * @param int $id
     * @param UpdateTransactionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionAPIRequest $request)
    {
        $input = $request->only([
            'user_id',
            'code',
            'grand_total',
            'status',
        ]);

        /** @var Transaction $transaction */
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            return $this->sendError('Transaction not found');
        }

        $transaction = $this->transactionRepository->update($input, $id);

        return $this->sendResponse(new TransactionResource($transaction), 'Transaction updated successfully');
    }

    /**
     * Remove the specified Transaction from storage.
     * DELETE /transactions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Transaction $transaction */
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            return $this->sendError('Transaction not found');
        }

        $transaction->delete();

        return $this->sendSuccess('Transaction deleted successfully');
    }

    public function refund($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            // return $this->sendError('Transaction not found');
            return Response::json(['message' => "Transaction not found", "success" => false], 200);
        }

        if ($transaction->status != "Active") {
            // return $this->sendError('Transaction Status is not valid');
            return Response::json(['message' => "Transaction Status is not valid", "success" => false], 200);
        }

        $now = time(); // or your date as well
        $your_date = strtotime($transaction->created_at);
        $datediff = $your_date - $now;
        $kadaluarsa = round($datediff / (60 * 60 * 24));
        if ($kadaluarsa >= 3) {
            // return $this->sendError('Time for refund exceeds the limit');
            return Response::json(['message' => "Time for refund exceeds the limit", "success" => false], 200);
        }

        $input = [
            "status" => "Refund"
        ];

        $transaction = $this->transactionRepository->update($input, $id);

        return $this->sendResponse(new TransactionResource($transaction), 'refund transaction is successful. wait for admin approval');
    }

    public function acceptRefund($id){
        // return $id;        
        try{
            $transaction = $this->transactionRepository->find($id);
            // dd($transaction);
            if (empty($transaction)) {
                return $this->sendError('Transaction not found');
            }

            if ($transaction->status != "Refund") {
                // return $this->sendError('Transaction Status is not valid');
                return Response::json(['message' => "Transaction Status is not valid", "success" => false], 200);
            }

            $input = [
                "status" => "Accept Refund"
            ];


            $user = User::query()->where('id', $transaction->user_id)->with("roles")->first();
            $parent = NULL;
            if($user->roles[0]->name == "Student"){
                $family = Family::query()->where('parent_id', $transaction->user_id)->first();
                if(empty($family)){
                    $parent = $transaction->user_id;
                }else{
                    $parent = $family->parent_id;
                }
            }else{
                $parent = $transaction->user_id;
            } 

            $userPoint = PointLog::where("parent_id", $parent)->where("transaction_id", $id)->where("transaction_type", "services")->orderBy('id', 'desc')->first()->point_after;
            $logPoin = [
              "parent_id" => $parent,
              "transaction_id" => $id,
              "transaction_type" => "refund service",
              "point_before" => intval($userPoint),
              "point_after" => intval($userPoint) + intval($transaction->grand_total),
            ];

            PointLog::insertLog($logPoin);
            $transaction = $this->transactionRepository->update($input, $id);
            return $this->sendResponse($transaction,'refund transaction is approved');
        }catch(\Exception $err){
            return Response::json(['message' => $err->getMessage(), "success" => false], 200);
        }
    }

    public function rejectRefund($id){
        try{
            $transaction = $this->transactionRepository->find($id);
            // dd($transaction);
            if (empty($transaction)) {
                return $this->sendError('Transaction not found');
            }

            if ($transaction->status != "Refund") {
                // return $this->sendError('Transaction Status is not valid');
                return Response::json(['message' => "Transaction Status is not valid", "success" => false], 200);
            }

            $input = [
                "status" => "Reject Refund"
            ];

            $transaction = $this->transactionRepository->update($input, $id);
            return $this->sendResponse($transaction,'refund transaction is rejected');
        }catch(\Exception $err){
            return Response::json(['message' => $err->getMessage(), "success" => false], 200);
        }
    }
}
