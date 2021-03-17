<?php

namespace App\Http\Controllers;

use App\DataTables\BarangKirimDataTable;
use App\Models\BarangKirim;
use App\Http\Requests;
use App\Http\Requests\CreateBarangKirimRequest;
use App\Http\Requests\UpdateBarangKirimRequest;
use App\Repositories\BarangKirimRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BarangKirimController extends AppBaseController
{
    /** @var  BarangKirimRepository */
    private $barangKirimRepository;

    public function __construct(BarangKirimRepository $barangKirimRepo)
    {
        $this->barangKirimRepository = $barangKirimRepo;
    }

    /**
     * Display a listing of the BarangKirim.
     *
     * @param BarangKirimDataTable $barangKirimDataTable
     * @return Response
     */
    public function index(BarangKirimDataTable $barangKirimDataTable)
    {
        return $barangKirimDataTable->render('barang_kirim.index');
    }

    /**
     * Show the form for creating a new BarangKirim.
     *
     * @return Response
     */
    public function create()
    {
        return view('barang_kirim.create');
    }

    /**
     * Store a newly created BarangKirim in storage.
     *
     * @param CreateBarangKirimRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangKirimRequest $request)
    {
        $input = $request->all();

        $barangKirim = $this->barangKirimRepository->create($input);

        Flash::success('Barang Kirim saved successfully.');

        return redirect(route('barangKirim.index'));
    }

    /**
     * Display the specified BarangKirim.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barangKirim = $this->barangKirimRepository->find($id);

        if (empty($barangKirim)) {
            Flash::error('Barang Kirim not found');

            return redirect(route('barangKirim.index'));
        }

        return view('barang_kirim.show')->with('barangKirim', $barangKirim);
    }

    /**
     * Show the form for editing the specified BarangKirim.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $barangKirim = $this->barangKirimRepository->find($id);

        if (empty($barangKirim)) {
            Flash::error('Barang Kirim not found');

            return redirect(route('barangKirim.index'));
        }

        return view('barang_kirim.edit')->with('barangKirim', $barangKirim);
    }

    /**
     * Update the specified BarangKirim in storage.
     *
     * @param  int              $id
     * @param UpdateBarangKirimRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangKirimRequest $request)
    {
        $barangKirim = $this->barangKirimRepository->find($id);

        if (empty($barangKirim)) {
            Flash::error('Barang Kirim not found');

            return redirect(route('barangKirim.index'));
        }

        $barangKirim = $this->barangKirimRepository->update($request->all(), $id);

        Flash::success('Barang Kirim updated successfully.');

        return redirect(route('barangKirim.index'));
    }

    /**
     * Remove the specified BarangKirim from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barangKirim = $this->barangKirimRepository->find($id);

        if (empty($barangKirim)) {
            Flash::error('Barang Kirim not found');

            return redirect(route('barangKirim.index'));
        }

        $this->barangKirimRepository->delete($id);

        Flash::success('Barang Kirim deleted successfully.');

        return redirect(route('barangKirim.index'));
    }
    
}
