<?php

namespace App\Http\Controllers;

use App\DataTables\LogKlaimBonusDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLogKlaimBonusRequest;
use App\Http\Requests\UpdateLogKlaimBonusRequest;
use App\Repositories\LogKlaimBonusRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LogKlaimBonusController extends AppBaseController
{
    /** @var  LogKlaimBonusRepository */
    private $logKlaimBonusRepository;

    public function __construct(LogKlaimBonusRepository $logKlaimBonusRepo)
    {
        $this->logKlaimBonusRepository = $logKlaimBonusRepo;
    }

    /**
     * Display a listing of the LogKlaimBonus.
     *
     * @param LogKlaimBonusDataTable $logKlaimBonusDataTable
     * @return Response
     */
    public function index(LogKlaimBonusDataTable $logKlaimBonusDataTable)
    {
        return $logKlaimBonusDataTable->render('log_klaim_bonus.index');
    }

    /**
     * Show the form for creating a new LogKlaimBonus.
     *
     * @return Response
     */
    public function create()
    {
        return view('log_klaim_bonus.create');
    }

    /**
     * Store a newly created LogKlaimBonus in storage.
     *
     * @param CreateLogKlaimBonusRequest $request
     *
     * @return Response
     */
    public function store(CreateLogKlaimBonusRequest $request)
    {
        $input = $request->all();

        $logKlaimBonus = $this->logKlaimBonusRepository->create($input);

        Flash::success('Log Klaim Bonus saved successfully.');

        return redirect(route('logKlaimBonus.index'));
    }

    /**
     * Display the specified LogKlaimBonus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logKlaimBonus = $this->logKlaimBonusRepository->find($id);

        if (empty($logKlaimBonus)) {
            Flash::error('Log Klaim Bonus not found');

            return redirect(route('logKlaimBonus.index'));
        }

        return view('log_klaim_bonus.show')->with('logKlaimBonus', $logKlaimBonus);
    }

    /**
     * Show the form for editing the specified LogKlaimBonus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logKlaimBonus = $this->logKlaimBonusRepository->find($id);

        if (empty($logKlaimBonus)) {
            Flash::error('Log Klaim Bonus not found');

            return redirect(route('logKlaimBonus.index'));
        }

        return view('log_klaim_bonus.edit')->with('logKlaimBonus', $logKlaimBonus);
    }

    /**
     * Update the specified LogKlaimBonus in storage.
     *
     * @param  int              $id
     * @param UpdateLogKlaimBonusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogKlaimBonusRequest $request)
    {
        $logKlaimBonus = $this->logKlaimBonusRepository->find($id);

        if (empty($logKlaimBonus)) {
            Flash::error('Log Klaim Bonus not found');

            return redirect(route('logKlaimBonus.index'));
        }

        $logKlaimBonus = $this->logKlaimBonusRepository->update($request->all(), $id);

        Flash::success('Log Klaim Bonus updated successfully.');

        return redirect(route('logKlaimBonus.index'));
    }

    /**
     * Remove the specified LogKlaimBonus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logKlaimBonus = $this->logKlaimBonusRepository->find($id);

        if (empty($logKlaimBonus)) {
            Flash::error('Log Klaim Bonus not found');

            return redirect(route('logKlaimBonus.index'));
        }

        $this->logKlaimBonusRepository->delete($id);

        Flash::success('Log Klaim Bonus deleted successfully.');

        return redirect(route('logKlaimBonus.index'));
    }
}
