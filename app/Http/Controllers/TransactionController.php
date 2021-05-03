<?php

namespace App\Http\Controllers;

use App\DataTables\TransactionDataTable;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

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
     * @param PointTransactionDataTable $transactionDataTable
     * @return Response
     */
    public function index(TransactionDataTable $transactionDataTable)
    {
        return $transactionDataTable->render('transactions.index');
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

        $transaction = $this->TransactionRepository->create($input);

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
        $transaction = $this->TransactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.show')->with('transaction', $transaction);
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
        $transaction = $this->TransactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit')->with('transaction', $transaction);
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
        $transaction = $this->TransactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $input = $request->only([
            'user_id',
            'code',
            'grand_total',
            'status',
        ]);

        $transaction = $this->TransactionRepository->update($input, $id);

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
        $transaction = $this->TransactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $this->TransactionRepository->delete($id);

        Flash::success('Transaction deleted successfully.');

        return redirect(route('transactions.index'));
    }
}
