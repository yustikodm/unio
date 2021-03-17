<?php

namespace App\Http\Controllers;

use App\DataTables\BankDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBankRequest;
use App\Http\Requests\UpdateBankRequest;
use App\Repositories\BankRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BankController extends AppBaseController
{
    /** @var  BankRepository */
    private $bankRepository;

    public function __construct(BankRepository $bankRepo)
    {
        $this->bankRepository = $bankRepo;
    }

    /**
     * Display a listing of the Bank.
     *
     * @param BankDataTable $bankDataTable
     * @return Response
     */
    public function index(BankDataTable $bankDataTable)
    {
        return $bankDataTable->render('bank.index');
    }

    /**
     * Show the form for creating a new Bank.
     *
     * @return Response
     */
    public function create()
    {
        return view('bank.create');
    }

    /**
     * Store a newly created Bank in storage.
     *
     * @param CreateBankRequest $request
     *
     * @return Response
     */
    public function store(CreateBankRequest $request)
    {
        $input = $request->all();

        $bank = $this->bankRepository->create($input);

        Flash::success('Bank saved successfully.');

        return redirect(route('bank.index'));
    }

    /**
     * Display the specified Bank.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bank = $this->bankRepository->find($id);

        if (empty($bank)) {
            Flash::error('Bank not found');

            return redirect(route('bank.index'));
        }

        return view('bank.show')->with('bank', $bank);
    }

    /**
     * Show the form for editing the specified Bank.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bank = $this->bankRepository->find($id);

        if (empty($bank)) {
            Flash::error('Bank not found');

            return redirect(route('bank.index'));
        }

        return view('bank.edit')->with('bank', $bank);
    }

    /**
     * Update the specified Bank in storage.
     *
     * @param  int              $id
     * @param UpdateBankRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBankRequest $request)
    {
        $bank = $this->bankRepository->find($id);

        if (empty($bank)) {
            Flash::error('Bank not found');

            return redirect(route('bank.index'));
        }

        $bank = $this->bankRepository->update($request->all(), $id);

        Flash::success('Bank updated successfully.');

        return redirect(route('bank.index'));
    }

    /**
     * Remove the specified Bank from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bank = $this->bankRepository->find($id);

        if (empty($bank)) {
            Flash::error('Bank not found');

            return redirect(route('bank.index'));
        }

        $this->bankRepository->delete($id);

        Flash::success('Bank deleted successfully.');

        return redirect(route('bank.index'));
    }
}
