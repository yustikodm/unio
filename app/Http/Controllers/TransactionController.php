<?php

namespace App\Http\Controllers;

use App\DataTables\TransactionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

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
            'entity_id',
            'entity_type',
            'amount',
            'point_conversion',
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
            'entity_id',
            'entity_type',
            'amount',
            'point_conversion',
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
}
