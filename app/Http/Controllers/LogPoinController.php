<?php

namespace App\Http\Controllers;

use App\DataTables\LogPoinDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLogPoinRequest;
use App\Http\Requests\UpdateLogPoinRequest;
use App\Repositories\LogPoinRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LogPoinController extends AppBaseController
{
    /** @var  LogPoinRepository */
    private $logPoinRepository;

    public function __construct(LogPoinRepository $logPoinRepo)
    {
        $this->logPoinRepository = $logPoinRepo;
    }

    /**
     * Display a listing of the LogPoin.
     *
     * @param LogPoinDataTable $logPoinDataTable
     * @return Response
     */
    public function index(LogPoinDataTable $logPoinDataTable)
    {
        return $logPoinDataTable->render('log_poin.index');
    }

    /**
     * Show the form for creating a new LogPoin.
     *
     * @return Response
     */
    public function create()
    {
        return view('log_poin.create');
    }

    /**
     * Store a newly created LogPoin in storage.
     *
     * @param CreateLogPoinRequest $request
     *
     * @return Response
     */
    public function store(CreateLogPoinRequest $request)
    {
        $input = $request->all();

        $logPoin = $this->logPoinRepository->create($input);

        Flash::success('Log Poin saved successfully.');

        return redirect(route('logPoin.index'));
    }

    /**
     * Display the specified LogPoin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logPoin = $this->logPoinRepository->find($id);

        if (empty($logPoin)) {
            Flash::error('Log Poin not found');

            return redirect(route('logPoin.index'));
        }

        return view('log_poin.show')->with('logPoin', $logPoin);
    }

    /**
     * Show the form for editing the specified LogPoin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logPoin = $this->logPoinRepository->find($id);

        if (empty($logPoin)) {
            Flash::error('Log Poin not found');

            return redirect(route('logPoin.index'));
        }

        return view('log_poin.edit')->with('logPoin', $logPoin);
    }

    /**
     * Update the specified LogPoin in storage.
     *
     * @param  int              $id
     * @param UpdateLogPoinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogPoinRequest $request)
    {
        $logPoin = $this->logPoinRepository->find($id);

        if (empty($logPoin)) {
            Flash::error('Log Poin not found');

            return redirect(route('logPoin.index'));
        }

        $logPoin = $this->logPoinRepository->update($request->all(), $id);

        Flash::success('Log Poin updated successfully.');

        return redirect(route('logPoin.index'));
    }

    /**
     * Remove the specified LogPoin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logPoin = $this->logPoinRepository->find($id);

        if (empty($logPoin)) {
            Flash::error('Log Poin not found');

            return redirect(route('logPoin.index'));
        }

        $this->logPoinRepository->delete($id);

        Flash::success('Log Poin deleted successfully.');

        return redirect(route('logPoin.index'));
    }
}
