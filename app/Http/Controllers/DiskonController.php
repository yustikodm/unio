<?php

namespace App\Http\Controllers;

use App\DataTables\DiskonDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDiskonRequest;
use App\Http\Requests\UpdateDiskonRequest;
use App\Repositories\DiskonRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DiskonController extends AppBaseController
{
    /** @var  DiskonRepository */
    private $diskonRepository;

    public function __construct(DiskonRepository $diskonRepo)
    {
        $this->diskonRepository = $diskonRepo;
    }

    /**
     * Display a listing of the Diskon.
     *
     * @param DiskonDataTable $diskonDataTable
     * @return Response
     */
    public function index(DiskonDataTable $diskonDataTable)
    {
        return $diskonDataTable->render('diskon.index');
    }

    /**
     * Show the form for creating a new Diskon.
     *
     * @return Response
     */
    public function create()
    {
        return view('diskon.create');
    }

    /**
     * Store a newly created Diskon in storage.
     *
     * @param CreateDiskonRequest $request
     *
     * @return Response
     */
    public function store(CreateDiskonRequest $request)
    {
        $input = $request->all();

        $diskon = $this->diskonRepository->create($input);

        Flash::success('Diskon saved successfully.');

        return redirect(route('diskon.index'));
    }

    /**
     * Display the specified Diskon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $diskon = $this->diskonRepository->getDiskon($id);

        if (empty($diskon)) {
            Flash::error('Diskon not found');

            return redirect(route('diskon.index'));
        }

        return view('diskon.show')->with('diskon', $diskon);
    }

    /**
     * Show the form for editing the specified Diskon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $diskon = $this->diskonRepository->find($id);

        if (empty($diskon)) {
            Flash::error('Diskon not found');

            return redirect(route('diskon.index'));
        }

        return view('diskon.edit')->with('diskon', $diskon);
    }

    /**
     * Update the specified Diskon in storage.
     *
     * @param  int              $id
     * @param UpdateDiskonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiskonRequest $request)
    {
        $diskon = $this->diskonRepository->find($id);

        if (empty($diskon)) {
            Flash::error('Diskon not found');

            return redirect(route('diskon.index'));
        }

        $diskon = $this->diskonRepository->update($request->all(), $id);

        Flash::success('Diskon updated successfully.');

        return redirect(route('diskon.index'));
    }

    /**
     * Remove the specified Diskon from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $diskon = $this->diskonRepository->find($id);

        if (empty($diskon)) {
            Flash::error('Diskon not found');

            return redirect(route('diskon.index'));
        }

        $this->diskonRepository->delete($id);

        Flash::success('Diskon deleted successfully.');

        return redirect(route('diskon.index'));
    }
}
