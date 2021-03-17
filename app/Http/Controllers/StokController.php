<?php

namespace App\Http\Controllers;

use App\DataTables\StokDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateStokRequest;
use App\Http\Requests\UpdateStokRequest;
use App\Repositories\StokRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class StokController extends AppBaseController
{
    /** @var  StokRepository */
    private $stokRepository;

    public function __construct(StokRepository $stokRepo)
    {
        $this->stokRepository = $stokRepo;
    }

    /**
     * Display a listing of the Stok.
     *
     * @param StokDataTable $stokDataTable
     * @return Response
     */
    public function index(StokDataTable $stokDataTable)
    {
        return $stokDataTable->render('stok.index');
    }

    /**
     * Show the form for creating a new Stok.
     *
     * @return Response
     */
    public function create()
    {
        return view('stok.create');
    }

    /**
     * Store a newly created Stok in storage.
     *
     * @param CreateStokRequest $request
     *
     * @return Response
     */
    public function store(CreateStokRequest $request)
    {
        $input = $request->all();

        $stok = $this->stokRepository->create($input);

        Flash::success('Stok saved successfully.');

        return redirect(route('stok.index'));
    }

    /**
     * Display the specified Stok.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stok = $this->stokRepository->getStok($id);

        if (empty($stok)) {
            Flash::error('Stok not found');

            return redirect(route('stok.index'));
        }

        return view('stok.show')->with('stok', $stok);
    }

    /**
     * Show the form for editing the specified Stok.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stok = $this->stokRepository->allQuery(['id' => $id])->first();

        if (empty($stok)) {
            Flash::error('Stok not found');

            return redirect(route('stok.index'));
        }

        return view('stok.edit')->with('stok', $stok);
    }

    /**
     * Update the specified Stok in storage.
     *
     * @param  int              $id
     * @param UpdateStokRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStokRequest $request)
    {
        $stok = $this->stokRepository->find($id);

        if (empty($stok)) {
            Flash::error('Stok not found');

            return redirect(route('stok.index'));
        }

        $stok = $this->stokRepository->update($request->all(), $id);

        Flash::success('Stok updated successfully.');

        return redirect(route('stok.index'));
    }

    /**
     * Remove the specified Stok from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stok = $this->stokRepository->find($id);

        if (empty($stok)) {
            Flash::error('Stok not found');

            return redirect(route('stok.index'));
        }

        $this->stokRepository->delete($id);

        Flash::success('Stok deleted successfully.');

        return redirect(route('stok.index'));
    }
}
