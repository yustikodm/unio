<?php

namespace App\Http\Controllers;

use App\DataTables\PelangganDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use App\Repositories\PelangganRepository;
use Flash;
use Carbon\Carbon;
use App\Http\Controllers\AppBaseController;
use Response;

class PelangganController extends AppBaseController
{
    /** @var  PelangganRepository */
    private $pelangganRepository;

    public function __construct(PelangganRepository $pelangganRepo)
    {
        $this->pelangganRepository = $pelangganRepo;
    }

    /**
     * Display a listing of the Pelanggan.
     *
     * @param PelangganDataTable $pelangganDataTable
     * @return Response
     */
    public function index(PelangganDataTable $pelangganDataTable)
    {
        return $pelangganDataTable->render('pelanggan.index');
    }

    /**
     * Show the form for creating a new Pelanggan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created Pelanggan in storage.
     *
     * @param CreatePelangganRequest $request
     *
     * @return Response
     */
    public function store(CreatePelangganRequest $request)
    {
        $input = $request->all();

        $lastRecord = $this->pelangganRepository->allQuery()->orderBy('created_at', 'desc')->first();
        if(empty($lastRecord)){
            $input['kode'] = 'PLG-'.date('ym').'-'.'0000';
        }else{
            $kodeOld = explode('-', $lastRecord->kode);
            if(count($kodeOld) == 3){
                if($kodeOld[1] == date('ym')){
                    $noUrut = intval($kodeOld[2]) + 1;
                    $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                    $input['kode'] = 'PLG-'.date('ym').'-'.$no;
                }else{
                    $input['kode'] = 'PLG-'.date('ym').'-'.'0000';
                }
            }else{
                $input['kode'] = 'PLG-'.date('ym').'-'.'0000';
            }
        }

        $input['lahir_tanggal'] = Carbon::parse($input['tanggal_lahir'])->format('d F Y');

        $pelanggan = $this->pelangganRepository->create($input);

        Flash::success('Pelanggan saved successfully.');

        return redirect(route('pelanggan.index'));
    }

    /**
     * Display the specified Pelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pelanggan = $this->pelangganRepository->getPelanggan($id);

        // var_dump($pelanggan);
        // die();
        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggan.index'));
        }

        return view('pelanggan.show')->with('pelanggan', $pelanggan);
    }

    /**
     * Show the form for editing the specified Pelanggan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pelanggan = $this->pelangganRepository->find($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggan.index'));
        }

        return view('pelanggan.edit')->with('pelanggan', $pelanggan);
    }

    /**
     * Update the specified Pelanggan in storage.
     *
     * @param  int              $id
     * @param UpdatePelangganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePelangganRequest $request)
    {
        $pelanggan = $this->pelangganRepository->find($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggan.index'));
        }

        $input = $request->all();

        $input['lahir_tanggal'] = Carbon::parse($input['tanggal_lahir'])->format('d F Y');

        $pelanggan = $this->pelangganRepository->update($input, $id);

        Flash::success('Pelanggan updated successfully.');

        return redirect(route('pelanggan.index'));
    }

    /**
     * Remove the specified Pelanggan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pelanggan = $this->pelangganRepository->find($id);

        if (empty($pelanggan)) {
            Flash::error('Pelanggan not found');

            return redirect(route('pelanggan.index'));
        }

        $this->pelangganRepository->delete($id);

        Flash::success('Pelanggan deleted successfully.');

        return redirect(route('pelanggan.index'));
    }
}
