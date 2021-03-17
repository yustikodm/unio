<?php

namespace App\Http\Controllers;

use App\DataTables\LogBintangDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLogBintangRequest;
use App\Http\Requests\UpdateLogBintangRequest;
use App\Repositories\LogBintangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LogBintangController extends AppBaseController
{
    /** @var  LogBintangRepository */
    private $logBintangRepository;

    public function __construct(LogBintangRepository $logBintangRepo)
    {
        $this->logBintangRepository = $logBintangRepo;
    }

    /**
     * Display a listing of the LogBintang.
     *
     * @param LogBintangDataTable $logBintangDataTable
     * @return Response
     */
    public function index(LogBintangDataTable $logBintangDataTable)
    {
        return $logBintangDataTable->render('log_bintang.index');
    }

    /**
     * Show the form for creating a new LogBintang.
     *
     * @return Response
     */
    public function create()
    {
        return view('log_bintang.create');
    }

    /**
     * Store a newly created LogBintang in storage.
     *
     * @param CreateLogBintangRequest $request
     *
     * @return Response
     */
    public function store(CreateLogBintangRequest $request)
    {
        $input = $request->all();

        $logBintang = $this->logBintangRepository->create($input);

        Flash::success('Log Bintang saved successfully.');

        return redirect(route('logBintang.index'));
    }

    /**
     * Display the specified LogBintang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $logBintang = $this->logBintangRepository->find($id);

        if (empty($logBintang)) {
            Flash::error('Log Bintang not found');

            return redirect(route('logBintang.index'));
        }

        return view('log_bintang.show')->with('logBintang', $logBintang);
    }

    /**
     * Show the form for editing the specified LogBintang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $logBintang = $this->logBintangRepository->find($id);

        if (empty($logBintang)) {
            Flash::error('Log Bintang not found');

            return redirect(route('logBintang.index'));
        }

        return view('log_bintang.edit')->with('logBintang', $logBintang);
    }

    /**
     * Update the specified LogBintang in storage.
     *
     * @param  int              $id
     * @param UpdateLogBintangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogBintangRequest $request)
    {
        $logBintang = $this->logBintangRepository->find($id);

        if (empty($logBintang)) {
            Flash::error('Log Bintang not found');

            return redirect(route('logBintang.index'));
        }

        $logBintang = $this->logBintangRepository->update($request->all(), $id);

        Flash::success('Log Bintang updated successfully.');

        return redirect(route('logBintang.index'));
    }

    /**
     * Remove the specified LogBintang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $logBintang = $this->logBintangRepository->find($id);

        if (empty($logBintang)) {
            Flash::error('Log Bintang not found');

            return redirect(route('logBintang.index'));
        }

        $this->logBintangRepository->delete($id);

        Flash::success('Log Bintang deleted successfully.');

        return redirect(route('logBintang.index'));
    }
}
