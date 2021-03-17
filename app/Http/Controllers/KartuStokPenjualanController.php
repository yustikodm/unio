<?php

namespace App\Http\Controllers;

use App\DataTables\KartuStokPenjualanDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateKartuStokPenjualanRequest;
use App\Http\Requests\UpdateKartuStokPenjualanRequest;
use App\Repositories\KartuStokPenjualanRepository;
use App\Models\KartuStokPenjualan;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KartuStokPenjualanController extends AppBaseController
{
    /** @var  KartuStokPenjualanRepository */
    private $kartuStokPenjualanRepository;

    public function __construct(KartuStokPenjualanRepository $kartuStokPenjualanRepo)
    {
        $this->kartuStokPenjualanRepository = $kartuStokPenjualanRepo;
    }

    /**
     * Display a listing of the KartuStokPenjualan.
     *
     * @param KartuStokPenjualanDataTable $kartuStokPenjualanDataTable
     * @return Response
     */
    public function index(KartuStokPenjualanDataTable $kartuStokPenjualanDataTable)
    {
        return $kartuStokPenjualanDataTable->render('kartu_stok_penjualan.index');
    }

    /**
     * Show the form for creating a new KartuStokPenjualan.
     *
     * @return Response
     */
    public function create()
    {
        return view('kartu_stok_penjualan.create');
    }

    /**
     * Store a newly created KartuStokPenjualan in storage.
     *
     * @param CreateKartuStokPenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreateKartuStokPenjualanRequest $request)
    {
        $input = $request->all();

        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->create($input);

        Flash::success('Kartu Stok Penjualan saved successfully.');

        return redirect(route('kartuStokPenjualan.index'));
    }

    /**
     * Display the specified KartuStokPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $kartuStokPenjualan = $this->kartuStokPenjualanRepository->find($id);
        $kartuStokPenjualan = KartuStokPenjualan::join('barang', 'barang.id', '=', 'kartu_stok_penjualan.barang_id')
                                                ->join('penjualan', 'penjualan.id', '=', 'kartu_stok_penjualan.penjualan_id')
                                                ->select('kartu_stok_penjualan.*', 'penjualan.kode', 'barang.nama')
                                                ->where('kartu_stok_penjualan.id', $id)
                                                ->first();


        if (empty($kartuStokPenjualan)) {
            Flash::error('Kartu Stok Penjualan not found');

            return redirect(route('kartuStokPenjualan.index'));
        }

        return view('kartu_stok_penjualan.show')->with('kartuStokPenjualan', $kartuStokPenjualan);
    }

    /**
     * Show the form for editing the specified KartuStokPenjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->find($id);

        if (empty($kartuStokPenjualan)) {
            Flash::error('Kartu Stok Penjualan not found');

            return redirect(route('kartuStokPenjualan.index'));
        }

        return view('kartu_stok_penjualan.edit')->with('kartuStokPenjualan', $kartuStokPenjualan);
    }

    /**
     * Update the specified KartuStokPenjualan in storage.
     *
     * @param  int              $id
     * @param UpdateKartuStokPenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKartuStokPenjualanRequest $request)
    {
        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->find($id);

        if (empty($kartuStokPenjualan)) {
            Flash::error('Kartu Stok Penjualan not found');

            return redirect(route('kartuStokPenjualan.index'));
        }

        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->update($request->all(), $id);

        Flash::success('Kartu Stok Penjualan updated successfully.');

        return redirect(route('kartuStokPenjualan.index'));
    }

    /**
     * Remove the specified KartuStokPenjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kartuStokPenjualan = $this->kartuStokPenjualanRepository->find($id);

        if (empty($kartuStokPenjualan)) {
            Flash::error('Kartu Stok Penjualan not found');

            return redirect(route('kartuStokPenjualan.index'));
        }

        $this->kartuStokPenjualanRepository->delete($id);

        Flash::success('Kartu Stok Penjualan deleted successfully.');

        return redirect(route('kartuStokPenjualan.index'));
    }
}
