<?php

namespace App\Http\Controllers;

use App\DataTables\PoinDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePoinRequest;
use App\Http\Requests\UpdatePoinRequest;
use App\Repositories\PoinRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PoinController extends AppBaseController
{
    /** @var  PoinRepository */
    private $poinRepository;

    public function __construct(PoinRepository $poinRepo)
    {
        $this->poinRepository = $poinRepo;
    }

    /**
     * Display a listing of the Poin.
     *
     * @param PoinDataTable $poinDataTable
     * @return Response
     */
    public function index(PoinDataTable $poinDataTable)
    {
        return $poinDataTable->render('poin.index');
    }

    /**
     * Show the form for creating a new Poin.
     *
     * @return Response
     */
    public function create()
    {
        return view('poin.create');
    }

    /**
     * Store a newly created Poin in storage.
     *
     * @param CreatePoinRequest $request
     *
     * @return Response
     */
    public function store(CreatePoinRequest $request)
    {
        $input = $request->all();

        $poin = $this->poinRepository->create($input);

        Flash::success('Poin saved successfully.');

        return redirect(route('poin.index'));
    }

    /**
     * Display the specified Poin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $poin = $this->poinRepository->find($id);

        if (empty($poin)) {
            Flash::error('Poin not found');

            return redirect(route('poin.index'));
        }

        return view('poin.show')->with('poin', $poin);
    }

    /**
     * Show the form for editing the specified Poin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $poin = $this->poinRepository->find($id);

        if (empty($poin)) {
            Flash::error('Poin not found');

            return redirect(route('poin.index'));
        }

        return view('poin.edit')->with('poin', $poin);
    }

    /**
     * Update the specified Poin in storage.
     *
     * @param  int              $id
     * @param UpdatePoinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePoinRequest $request)
    {
        $poin = $this->poinRepository->find($id);

        if (empty($poin)) {
            Flash::error('Poin not found');

            return redirect(route('poin.index'));
        }

        $poin = $this->poinRepository->update($request->all(), $id);

        Flash::success('Poin updated successfully.');

        return redirect(route('poin.index'));
    }

    /**
     * Remove the specified Poin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $poin = $this->poinRepository->find($id);

        if (empty($poin)) {
            Flash::error('Poin not found');

            return redirect(route('poin.index'));
        }

        $this->poinRepository->delete($id);

        Flash::success('Poin deleted successfully.');

        return redirect(route('poin.index'));
    }
}
