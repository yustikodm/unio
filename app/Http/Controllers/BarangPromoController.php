<?php

namespace App\Http\Controllers;

use App\DataTables\BarangPromoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBarangPromoRequest;
use App\Http\Requests\UpdateBarangPromoRequest;
use App\Repositories\BarangPromoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BarangPromoController extends AppBaseController
{
    /** @var  BarangPromoRepository */
    private $barangPromoRepository;

    public function __construct(BarangPromoRepository $barangPromoRepo)
    {
        $this->barangPromoRepository = $barangPromoRepo;
    }

    /**
     * Display a listing of the BarangPromo.
     *
     * @param BarangPromoDataTable $barangPromoDataTable
     * @return Response
     */
    public function index(BarangPromoDataTable $barangPromoDataTable)
    {
        return $barangPromoDataTable->render('barangpromo.index');
    }

    /**
     * Show the form for creating a new BarangPromo.
     *
     * @return Response
     */
    public function create()
    {
        return view('barangpromo.create');
    }

    /**
     * Store a newly created BarangPromo in storage.
     *
     * @param CreateBarangPromoRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangPromoRequest $request)
    {
        $input = $request->all();

        $barangPromo = $this->barangPromoRepository->create($input);

        Flash::success('Barang Promo saved successfully.');

        return redirect(route('barangpromo.index'));
    }

    /**
     * Display the specified BarangPromo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barangPromo = $this->barangPromoRepository->find($id);

        if (empty($barangPromo)) {
            Flash::error('Barang Promo not found');

            return redirect(route('barangpromo.index'));
        }

        return view('barangpromo.show')->with('barangPromo', $barangPromo);
    }

    /**
     * Show the form for editing the specified BarangPromo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barangPromo = $this->barangPromoRepository->find($id);

        if (empty($barangPromo)) {
            Flash::error('Barang Promo not found');

            return redirect(route('barangpromo.index'));
        }

        return view('barangpromo.edit')->with('barangPromo', $barangPromo);
    }

    /**
     * Update the specified BarangPromo in storage.
     *
     * @param  int              $id
     * @param UpdateBarangPromoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangPromoRequest $request)
    {
        $barangPromo = $this->barangPromoRepository->find($id);

        if (empty($barangPromo)) {
            Flash::error('Barang Promo not found');

            return redirect(route('barangpromo.index'));
        }

        $barangPromo = $this->barangPromoRepository->update($request->all(), $id);

        Flash::success('Barang Promo updated successfully.');

        return redirect(route('barangpromo.index'));
    }

    /**
     * Remove the specified BarangPromo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barangPromo = $this->barangPromoRepository->find($id);

        if (empty($barangPromo)) {
            Flash::error('Barang Promo not found');

            return redirect(route('barangpromo.index'));
        }

        $this->barangPromoRepository->delete($id);

        Flash::success('Barang Promo deleted successfully.');

        return redirect(route('barangpromo.index'));
    }
}
