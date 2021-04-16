<?php

namespace App\Http\Controllers;

use App\DataTables\PointTransactionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePointTransactionRequest;
use App\Http\Requests\UpdatePointTransactionRequest;
use App\Repositories\PointTransactionRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PointTransactionController extends AppBaseController
{
    /** @var  PointTransactionRepository */
    private $pointTransactionRepository;

    public function __construct(PointTransactionRepository $pointTransactionRepo)
    {
        $this->pointTransactionRepository = $pointTransactionRepo;
    }

    /**
     * Display a listing of the PointTransaction.
     *
     * @param PointTransactionDataTable $pointTransactionDataTable
     * @return Response
     */
    public function index(PointTransactionDataTable $pointTransactionDataTable)
    {
        return $pointTransactionDataTable->render('point_transactions.index');
    }

    /**
     * Show the form for creating a new PointTransaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('point_transactions.create');
    }

    /**
     * Store a newly created PointTransaction in storage.
     *
     * @param CreatePointTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreatePointTransactionRequest $request)
    {
        $input = $request->all();

        $pointTransaction = $this->pointTransactionRepository->create($input);

        Flash::success('Point Transaction saved successfully.');

        return redirect(route('pointTransactions.index'));
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
        $pointTransaction = $this->pointTransactionRepository->find($id);

        if (empty($pointTransaction)) {
            Flash::error('Point Transaction not found');

            return redirect(route('pointTransactions.index'));
        }

        return view('point_transactions.show')->with('pointTransaction', $pointTransaction);
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
        $pointTransaction = $this->pointTransactionRepository->find($id);

        if (empty($pointTransaction)) {
            Flash::error('Point Transaction not found');

            return redirect(route('pointTransactions.index'));
        }

        return view('point_transactions.edit')->with('pointTransaction', $pointTransaction);
    }

    /**
     * Update the specified PointTransaction in storage.
     *
     * @param  int              $id
     * @param UpdatePointTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePointTransactionRequest $request)
    {
        $pointTransaction = $this->pointTransactionRepository->find($id);

        if (empty($pointTransaction)) {
            Flash::error('Point Transaction not found');

            return redirect(route('pointTransactions.index'));
        }

        $pointTransaction = $this->pointTransactionRepository->update($request->all(), $id);

        Flash::success('Point Transaction updated successfully.');

        return redirect(route('pointTransactions.index'));
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
        $pointTransaction = $this->pointTransactionRepository->find($id);

        if (empty($pointTransaction)) {
            Flash::error('Point Transaction not found');

            return redirect(route('pointTransactions.index'));
        }

        $this->pointTransactionRepository->delete($id);

        Flash::success('Point Transaction deleted successfully.');

        return redirect(route('pointTransactions.index'));
    }
}
