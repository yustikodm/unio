<?php

namespace App\Http\Controllers;

use App\DataTables\BarangDataTable;
use App\Http\Requests;
use App\Models\Stok;
use App\Models\Harga;
use App\Models\Diskon;
use App\Http\Requests\CreateBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Repositories\BarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class BarangController extends AppBaseController
{
    /** @var  BarangRepository */
    private $barangRepository;

    public function __construct(BarangRepository $barangRepo)
    {
        $this->barangRepository = $barangRepo;
    }

    /**
     * Display a listing of the Barang.
     *
     * @param BarangDataTable $barangDataTable
     * @return Response
     */
    public function index(BarangDataTable $barangDataTable)
    {
        return $barangDataTable->render('barang.index');
    }

    /**
     * Show the form for creating a new Barang.
     *
     * @return Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created Barang in storage.
     *
     * @param CreateBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangRequest $request)
    {
        $input = $request->all();

        // $lastRecord = $this->barangRepository->getLastRow();
        // if(empty($lastRecord)){
        //     $input['kode'] = 'BRG-'.date('ym').'-'.'0000';
        // }else{
        //     $kodeOld = explode('-', $lastRecord->kode);
        //     if(count($kodeOld) == 3){
        //         if($kodeOld[1] == date('ym')){
        //             $noUrut = intval($kodeOld[2]) + 1;
        //             $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
        //             $input['kode'] = 'BRG-'.date('ym').'-'.$no;
        //         }else{
        //             $input['kode'] = 'BRG-'.date('ym').'-'.'0000';
        //         }
        //     }else{
        //         $input['kode'] = 'BRG-'.date('ym').'-'.'0000';
        //     }
        // }

        $barang = $this->barangRepository->create($input);

        $stok = new Stok;
        $harga = new Harga;
        $diskon = new Diskon;

        $stok->barang_id = $barang->id;
        $stok->stok = 0;
        $stok->save();

        $harga->barang_id = $barang->id;
        $harga->harga = 0;
        $harga->save();

        $diskon->barang_id = $barang->id;
        $diskon->diskon = 0;
        $diskon->save();

        Flash::success('Barang saved successfully.');

        return redirect(route('barang.index'));
    }

    /**
     * Display the specified Barang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $barang = $this->barangRepository->getBarang($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barang.index'));
        }

        return view('barang.show')->with('barang', $barang);
    }

    /**
     * Show the form for editing the specified Barang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {        
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barang.index'));
        }

        return view('barang.edit')->with('barang', $barang);
    }

    /**
     * Update the specified Barang in storage.
     *
     * @param  int              $id
     * @param UpdateBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangRequest $request)
    {
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barang.index'));
        }

        $barang = $this->barangRepository->update($request->all(), $id);

        Flash::success('Barang updated successfully.');

        return redirect(route('barang.index'));
    }

    /**
     * Remove the specified Barang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $barang = $this->barangRepository->find($id);

        if (empty($barang)) {
            Flash::error('Barang not found');

            return redirect(route('barang.index'));
        }

        $this->barangRepository->delete($id);

        Flash::success('Barang deleted successfully.');

        return redirect(route('barang.index'));
    }
}
