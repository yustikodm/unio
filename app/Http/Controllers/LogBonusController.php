<?php

namespace App\Http\Controllers;

use App\DataTables\LogBonusDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLogBonusRequest;
use App\Http\Requests\UpdateLogBonusRequest;
use App\Repositories\LogBonusRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LogBonusController extends AppBaseController
{
    /** @var  LogBonusRepository */
    private $logBonusRepository;

    public function __construct(LogBonusRepository $logBonusRepo)
    {
        $this->logBonusRepository = $logBonusRepo;
    }

    /**
     * Display a listing of the LogBonus.
     *
     * @param LogBonusDataTable $logBonusDataTable
     * @return Response
     */
    public function index(LogBonusDataTable $logBonusDataTable)
    {
        return $logBonusDataTable->render('log_bonus.index');
    }

    /**
     * Show the form for creating a new LogBonus.
     *
     * @return Response
     */
    public function create()
    {
        return view('log_bonus.create');
    }

    /**
     * Store a newly created LogBonus in storage.
     *
     * @param CreateLogBonusRequest $request
     *
     * @return Response
     */
    public function store(CreateLogBonusRequest $request)
    {
        $input = $request->all();

        $logBonus = $this->logBonusRepository->create($input);

        Flash::success('Log Bonus saved successfully.');

        return redirect(route('logBonus.index'));
    }

    /**
     * Display the specified LogBonus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logBonus = $this->logBonusRepository->find($id);

        if (empty($logBonus)) {
            Flash::error('Log Bonus not found');

            return redirect(route('logBonus.index'));
        }

        return view('log_bonus.show')->with('logBonus', $logBonus);
    }

    /**
     * Show the form for editing the specified LogBonus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logBonus = $this->logBonusRepository->find($id);

        if (empty($logBonus)) {
            Flash::error('Log Bonus not found');

            return redirect(route('logBonus.index'));
        }

        return view('log_bonus.edit')->with('logBonus', $logBonus);
    }

    /**
     * Update the specified LogBonus in storage.
     *
     * @param  int              $id
     * @param UpdateLogBonusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogBonusRequest $request)
    {
        $logBonus = $this->logBonusRepository->find($id);

        if (empty($logBonus)) {
            Flash::error('Log Bonus not found');

            return redirect(route('logBonus.index'));
        }

        $logBonus = $this->logBonusRepository->update($request->all(), $id);

        Flash::success('Log Bonus updated successfully.');

        return redirect(route('logBonus.index'));
    }

    /**
     * Remove the specified LogBonus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logBonus = $this->logBonusRepository->find($id);

        if (empty($logBonus)) {
            Flash::error('Log Bonus not found');

            return redirect(route('logBonus.index'));
        }

        $this->logBonusRepository->delete($id);

        Flash::success('Log Bonus deleted successfully.');

        return redirect(route('logBonus.index'));
    }
}
