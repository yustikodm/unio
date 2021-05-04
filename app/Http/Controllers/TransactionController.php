<?php

namespace App\Http\Controllers;

use App\DataTables\TransactionDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\Transaction;
use App\Models\Family;
use App\User;
use App\Models\PointLog;

class TransactionController extends AppBaseController
{
    /** @var  TransactionRepository */
    private $TransactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->TransactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the PointTransaction.
     *
     * @param PointTransactionDataTable $pointTransactionDataTable
     * @return Response
     */
    public function index(TransactionDataTable $pointTransactionDataTable)
    {
        return $pointTransactionDataTable->render('transactions.index');
    }

    /**
     * Show the form for creating a new PointTransaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created PointTransaction in storage.
     *
     * @param CreateTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->only([
            'user_id',
            'code',
            'grand_total',
            'status',
        ]);

        $pointTransaction = $this->TransactionRepository->create($input);

        Flash::success('Transaction saved successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Display the specified PointTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pointTransaction = $this->TransactionRepository->find($id);

        if (empty($pointTransaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.show')->with('pointTransaction', $pointTransaction);
    }

    /**
     * Show the form for editing the specified PointTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pointTransaction = $this->TransactionRepository->find($id);

        if (empty($pointTransaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit')->with('pointTransaction', $pointTransaction);
    }

    /**
     * Update the specified PointTransaction in storage.
     *
     * @param  int $id
     * @param UpdateTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $pointTransaction = $this->TransactionRepository->find($id);

        if (empty($pointTransaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $input = $request->only([
            'user_id',
            'code',
            'grand_total',
            'status',
        ]);

        $pointTransaction = $this->TransactionRepository->update($input, $id);

        Flash::success('Transaction updated successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified PointTransaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pointTransaction = $this->TransactionRepository->find($id);

        if (empty($pointTransaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $this->TransactionRepository->delete($id);

        Flash::success('Transaction deleted successfully.');

        return redirect(route('transactions.index'));
    }

    public function acceptRefund($id){
        // return $id;        
        $transaction = $this->TransactionRepository->find($id);

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

        $transaction = $this->TransactionRepository->update($input, $id);

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

        $userPoint = PointLog::where("perent_id", $parent)->where("transaction_id", $id)->where("transaction_type", "service")->last()->point_after;

        $logPoin = [
          "parent_id" => $parent,
          "transaction_id" => $id,
          "transaction_type" => "refund service",
          "point_before" => intval($userPoint),
          "point_after" => intval($userPoint) + intval($transaction->grand_total),
        ];

        PointLog::insertLog($logPoin);

        return $this->sendResponse('refund transaction is approved');
    }

    public function rejectRefund($id){
        
    }
}
