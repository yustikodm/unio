<?php

namespace App\Http\Controllers;

use App\DataTables\HistoryKlaimHadiahDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHistoryKlaimHadiahRequest;
use App\Http\Requests\UpdateHistoryKlaimHadiahRequest;
use App\Repositories\HistoryKlaimHadiahRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class HistoryKlaimHadiahController extends AppBaseController
{
    /** @var  HistoryKlaimHadiahRepository */
    private $historyKlaimHadiahRepository;

    public function __construct(HistoryKlaimHadiahRepository $historyKlaimHadiahRepo)
    {
        $this->historyKlaimHadiahRepository = $historyKlaimHadiahRepo;
    }

    /**
     * Display a listing of the HistoryKlaimHadiah.
     *
     * @param HistoryKlaimHadiahDataTable $historyKlaimHadiahDataTable
     * @return Response
     */
    public function index(HistoryKlaimHadiahDataTable $historyKlaimHadiahDataTable)
    {
        return $historyKlaimHadiahDataTable->render('history_klaim_hadiah.index');
    }

    /**
     * Show the form for creating a new HistoryKlaimHadiah.
     *
     * @return Response
     */
    public function create()
    {
        return view('history_klaim_hadiah.create');
    }

    /**
     * Store a newly created HistoryKlaimHadiah in storage.
     *
     * @param CreateHistoryKlaimHadiahRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoryKlaimHadiahRequest $request)
    {
        $input = $request->all();

        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->create($input);

        Flash::success('History Klaim Hadiah saved successfully.');

        return redirect(route('historyKlaimHadiah.index'));
    }

    /**
     * Display the specified HistoryKlaimHadiah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->find($id);

        if (empty($historyKlaimHadiah)) {
            Flash::error('History Klaim Hadiah not found');

            return redirect(route('historyKlaimHadiah.index'));
        }

        return view('history_klaim_hadiah.show')->with('historyKlaimHadiah', $historyKlaimHadiah);
    }

    /**
     * Show the form for editing the specified HistoryKlaimHadiah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->find($id);

        if (empty($historyKlaimHadiah)) {
            Flash::error('History Klaim Hadiah not found');

            return redirect(route('historyKlaimHadiah.index'));
        }

        return view('history_klaim_hadiah.edit')->with('historyKlaimHadiah', $historyKlaimHadiah);
    }

    /**
     * Update the specified HistoryKlaimHadiah in storage.
     *
     * @param  int              $id
     * @param UpdateHistoryKlaimHadiahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoryKlaimHadiahRequest $request)
    {
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->find($id);

        if (empty($historyKlaimHadiah)) {
            Flash::error('History Klaim Hadiah not found');

            return redirect(route('historyKlaimHadiah.index'));
        }

        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->update($request->all(), $id);

        Flash::success('History Klaim Hadiah updated successfully.');

        return redirect(route('historyKlaimHadiah.index'));
    }

    /**
     * Remove the specified HistoryKlaimHadiah from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->find($id);

        if (empty($historyKlaimHadiah)) {
            Flash::error('History Klaim Hadiah not found');

            return redirect(route('historyKlaimHadiah.index'));
        }

        $this->historyKlaimHadiahRepository->delete($id);

        Flash::success('History Klaim Hadiah deleted successfully.');

        return redirect(route('historyKlaimHadiah.index'));
    }

    public function manajemenHadiah(){
        
        $data['data'] = $this->historyKlaimHadiahRepository->get();
        return view('history_klaim_hadiah.manage', $data);
    }
}
