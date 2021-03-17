<?php

namespace App\Http\Controllers;

use App\DataTables\MutasiKasDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMutasiKasRequest;
use App\Http\Requests\UpdateMutasiKasRequest;
use App\Repositories\MutasiKasRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Exports\KasExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Http\Request;


class MutasiKasController extends AppBaseController
{
    /** @var  MutasiKasRepository */
    private $mutasiKasRepository;

    public function __construct(MutasiKasRepository $mutasiKasRepo)
    {
        $this->mutasiKasRepository = $mutasiKasRepo;
    }

    /**
     * Display a listing of the MutasiKas.
     *
     * @param MutasiKasDataTable $mutasiKasDataTable
     * @return Response
     */
    public function index()
    {

        $data['kasMasuk'] = $this->mutasiKasRepository->allQuery(['tipe' => 'Masuk'])->get();
        $data['totalMasuk'] = 0;
        foreach($data['kasMasuk'] as $row){
            $data['totalMasuk'] += $row->jumlah;
        }
        $data['kasKeluar'] = $this->mutasiKasRepository->allQuery(['tipe' => 'Keluar'])->get();
        $data['totalKeluar'] = 0;
        foreach($data['kasKeluar'] as $row){
            $data['totalKeluar'] += $row->jumlah;
        }
        return view('mutasi_kas.index', $data);
    }

    /**
     * Show the form for creating a new MutasiKas.
     *
     * @return Response
     */
    public function create()
    {
        return view('mutasi_kas.create');
    }

    /**
     * Store a newly created MutasiKas in storage.
     *
     * @param CreateMutasiKasRequest $request
     *
     * @return Response
     */
    public function store(CreateMutasiKasRequest $request)
    {
        $input = $request->all();

        if($input['tipe'] == "Keluar"){
            $lastRecord = $this->mutasiKasRepository->getLastKode('MKK');
        }else if($input['tipe'] == "Masuk"){
            $lastRecord = $this->mutasiKasRepository->getLastKode('MKM');
        }

        if(empty($lastRecord)){
            if($input['tipe'] == "Keluar"){
                $input['kode'] = 'MKK-'.date('ym').'-'.'0000';
            }else if($input['tipe'] == "Masuk"){
                $input['kode'] = 'MKM-'.date('ym').'-'.'0000';
            }
        }else{
            if($input['tipe'] == "Keluar"){
                $kodeOld = explode('-', $lastRecord->kode);
                if(count($kodeOld) == 3){
                    if($kodeOld[1] == date('ym')){
                        $noUrut = intval($kodeOld[2]) + 1;
                        $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                        $input['kode'] = 'MKK-'.date('ym').'-'.$no;
                    }else{
                        $input['kode'] = 'MKK-'.date('ym').'-'.'0000';
                    }
                }else{
                    $input['kode'] = 'MKK-'.date('ym').'-'.'0000';
                }
            }else if($input['tipe'] == "Masuk"){
                $kodeOld = explode('-', $lastRecord->kode);
                if(count($kodeOld) == 3){
                    if($kodeOld[1] == date('ym')){
                        $noUrut = intval($kodeOld[2]) + 1;
                        $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                        $input['kode'] = 'MKM-'.date('ym').'-'.$no;
                    }else{
                        $input['kode'] = 'MKM-'.date('ym').'-'.'0000';
                    }
                }else{
                    $input['kode'] = 'MKM-'.date('ym').'-'.'0000';
                }
            }
        }

        $mutasiKas = $this->mutasiKasRepository->create($input);

        Flash::success('Mutasi Kas saved successfully.');

        return redirect(route('mutasiKas.index'));
    }

    /**
     * Display the specified MutasiKas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mutasiKas = $this->mutasiKasRepository->find($id);

        if (empty($mutasiKas)) {
            Flash::error('Mutasi Kas not found');

            return redirect(route('mutasiKas.index'));
        }

        return view('mutasi_kas.show')->with('mutasiKas', $mutasiKas);
    }

    /**
     * Show the form for editing the specified MutasiKas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mutasiKas = $this->mutasiKasRepository->find($id);

        if (empty($mutasiKas)) {
            Flash::error('Mutasi Kas not found');

            return redirect(route('mutasiKas.index'));
        }

        return view('mutasi_kas.edit')->with('mutasiKas', $mutasiKas);
    }

    /**
     * Update the specified MutasiKas in storage.
     *
     * @param  int              $id
     * @param UpdateMutasiKasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMutasiKasRequest $request)
    {
        $mutasiKas = $this->mutasiKasRepository->find($id);

        if (empty($mutasiKas)) {
            Flash::error('Mutasi Kas not found');

            return redirect(route('mutasiKas.index'));
        }

        $mutasiKas = $this->mutasiKasRepository->update($request->all(), $id);

        Flash::success('Mutasi Kas updated successfully.');

        return redirect(route('mutasiKas.index'));
    }

    /**
     * Remove the specified MutasiKas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mutasiKas = $this->mutasiKasRepository->find($id);

        if (empty($mutasiKas)) {
            Flash::error('Mutasi Kas not found');

            return redirect(route('mutasiKas.index'));
        }

        $this->mutasiKasRepository->delete($id);

        Flash::success('Mutasi Kas deleted successfully.');

        return redirect(route('mutasiKas.index'));
    }

    public function arusKas(Request $request)
    {
        $data = [];
        if((!empty($request->input('tp')) && !empty($request->input('f')) && !empty($request->input('t')) )){
            $data['kas'] = $this->mutasiKasRepository->getKas($request->input('tp'),$request->input('f'), $request->input('t'));
            $data['jumlahKas'] = 0;
            foreach($data['kas'] as $row){
                $data['jumlahKas'] += $row->jumlah;
            }
            if($request->input('tp') == "Semua"){
                $data['totalMasuk'] = 0;
                $data['totalKeluar'] = 0;
                foreach($data['kas'] as $row){
                    if($row->tipe == "Masuk"){
                        $data['totalMasuk'] += $row->jumlah;
                    }
                    if($row->tipe == "Keluar"){
                        $data['totalKeluar'] += $row->jumlah;
                    }
                }
            }
        }
        return view('mutasi_kas.aruskas', $data);
    }

    public function exportKas(Request $request)
    {
        if((!empty($request->input('tp')) && !empty($request->input('f')) && !empty($request->input('t')) )){
        $timestamp = Carbon::now()->format('dmYHis');
        return Excel::download(new KasExport($request->input('tp'), $request->input('f'), $request->input('t')), 'kas_' .$request->input('tp'). $timestamp . '.xlsx');
      }
    }
}
