<?php

namespace App\Http\Controllers;

use App\DataTables\PenerimaanReturDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePenerimaanReturRequest;
use App\Http\Requests\UpdatePenerimaanReturRequest;
use App\Repositories\PenerimaanReturRepository;
use App\Repositories\PegawaiRepository;
use App\Repositories\KartuStokReturBarangRepository;
use App\Repositories\RekapStokRepository;
use App\Models\BarangPenerimaan;
use App\Models\PenerimaanRetur;
use App\Models\BarangRetur;
use App\Models\Stok;
use App\Models\ReturBarang;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PenerimaanReturController extends AppBaseController
{
    /** @var  PenerimaanReturRepository */
    private $penerimaanReturRepository;
    private $kartuStokReturBarangRepository;
    private $rekapStokRepository;

    public function __construct(
        PenerimaanReturRepository $penerimaanReturRepo,
        KartuStokReturBarangRepository $kartuStokReturBarangRepo,
        RekapStokRepository $rekapStokRepo,
        PegawaiRepository $pegawai)
    {
        $this->penerimaanReturRepository = $penerimaanReturRepo;
        $this->kartuStokReturBarangRepository = $kartuStokReturBarangRepo;
        $this->rekapStokRepository = $rekapStokRepo;
        $this->pegawaiRepository = $pegawai;
    }

    /**
     * Display a listing of the PenerimaanRetur.
     *
     * @param PenerimaanReturDataTable $penerimaanReturDataTable
     * @return Response
     */
    public function index(PenerimaanReturDataTable $penerimaanReturDataTable)
    {
        return $penerimaanReturDataTable->render('penerimaan_retur.index');
    }

    /**
     * Show the form for creating a new PenerimaanRetur.
     *
     * @return Response
     */
    public function create()
    {
        $data['PegawaiUser'] = '';
        if(auth()->user()->hasRole('admin')){

        }else{
            $userLoginid = auth()->user()->id;
            $pegawai = $this->pegawaiRepository->getUserByUserId($userLoginid);
            if(!empty($pegawai)){
                $data['PegawaiUser'] = $pegawai;
            }
        }
        return view('penerimaan_retur.create', $data);
    }

    /**
     * Store a newly created PenerimaanRetur in storage.
     *
     * @param CreatePenerimaanReturRequest $request
     *
     * @return Response
     */
    public function store(CreatePenerimaanReturRequest $request)
    {
        $input = $request->all();

        $penerimaanRetur = $this->penerimaanReturRepository->create($input);

        Flash::success('Penerimaan Retur saved successfully.');

        return redirect(route('penerimaanRetur.index'));
    }

    /**
     * Display the specified PenerimaanRetur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $data['penerimaanRetur'] = PenerimaanRetur::join('retur_barang', 'retur_barang.id', '=', 'penerimaan_retur.retur_barang_id')
                                                    ->join('supplier', 'supplier.id', '=', 'penerimaan_retur.supplier_id')
                                                    ->join('pegawai', 'pegawai.id', '=', 'penerimaan_retur.pegawai_id')
                                                    ->select('penerimaan_retur.*', 'retur_barang.kode as kode_retur', 'supplier.nama as nama_supplier', 'pegawai.nama as nama_pegawai')
                                                    ->where('penerimaan_retur.id', $id)
                                                    ->first();
        $data['barangPenerimaan'] = BarangPenerimaan::join('barang', 'barang.id', '=','barang_penerimaan.barang_id')
                                                    ->select('barang.nama as nama_barang', 'barang_penerimaan.*')
                                                    ->where('barang_penerimaan.penerimaan_retur_id', $id)
                                                    ->get();



        if (empty($data['penerimaanRetur'])) {
            Flash::error('Penerimaan Retur not found');

            return redirect(route('penerimaanRetur.index'));
        }

        return view('penerimaan_retur.show', $data);
    }

    /**
     * Show the form for editing the specified PenerimaanRetur.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data['penerimaanRetur'] = $this->penerimaanReturRepository->find($id);
        $idrb = $data['penerimaanRetur']->retur_barang_id;
        $kodeKirim = ReturBarang::where('id', $idrb)->first()->kode;
        $data['penerimaanRetur']->kode_retur = $kodeKirim;
        $barang = BarangRetur::join('barang', "barang.id", "=", "barang_retur.barang_id")
                            // ->join("retur_barang", "penerimaan_retur.retur_barang_id", "=", "barang_retur.retur_barang_id")
                            ->select('barang.nama', 'barang_retur.*')
                            ->where('barang_retur.retur_barang_id', '=', $idrb)
                            ->get();
        $array = [];

        $data['PegawaiUser'] = '';
        if(auth()->user()->hasRole('admin')){

        }else{
            $userLoginid = auth()->user()->id;
            $pegawai = $this->pegawaiRepository->getUserByUserId($userLoginid);
            if(!empty($pegawai)){
                $data['PegawaiUser'] = $pegawai;
            }
        }

        foreach ($barang as $b){
            $bhasil  = BarangPenerimaan::join('barang', "barang.id", "=", "barang_penerimaan.barang_id")
                                        ->select('barang.nama', 'barang_penerimaan.*')
                                        ->where('barang_penerimaan.penerimaan_retur_id', $id)
                                        ->where('barang_penerimaan.barang_id', $b->barang_id)
                                        ->first();
            if(!empty($bhasil)){
                $b->checked = true;
                // $b->jumlah_kurang = $bhasil->jumlah;
                array_push($array, $b);
            }else{
                $b->checked = false;
                array_push($array, $b);
            }
        }

        $data['BarangPenerimaan'] = $array;

        if (empty($data['penerimaanRetur'])) {
            Flash::error('Penerimaan Retur not found');

            return redirect(route('penerimaanRetur.index'));
        }

        return view('penerimaan_retur.edit', $data);
    }

    /**
     * Update the specified PenerimaanRetur in storage.
     *
     * @param  int              $id
     * @param UpdatePenerimaanReturRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenerimaanReturRequest $request)
    {
        $penerimaanRetur = $this->penerimaanReturRepository->find($id);

        if (empty($penerimaanRetur)) {
            Flash::error('Penerimaan Retur not found');

            return redirect(route('penerimaanRetur.index'));
        }

        $penerimaanRetur = $this->penerimaanReturRepository->update($request->all(), $id);

        Flash::success('Penerimaan Retur updated successfully.');

        return redirect(route('penerimaanRetur.index'));
    }

    /**
     * Remove the specified PenerimaanRetur from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penerimaanRetur = $this->penerimaanReturRepository->find($id);

        if (empty($penerimaanRetur)) {
            Flash::error('Penerimaan Retur not found');

            return redirect(route('penerimaanRetur.index'));
        }

        $this->penerimaanReturRepository->delete($id);

        Flash::success('Penerimaan Retur deleted successfully.');

        return redirect(route('penerimaanRetur.index'));
    }

    public function updatePenerimaan($id){
        $returBarang = $this->penerimaanReturRepository->find($id);
        $barangRetur = BarangPenerimaan::where('penerimaan_retur_id', $id)->get();
        $check = [];
        foreach ($barangRetur as $br) {
            $stok = Stok::join('barang', 'barang.id', '=', 'stok.barang_id')->select('stok.*', 'barang.nama')->where('barang_id', $br->barang_id)->first();
            if($stok->stok >= $br->jumlah){

            }else{
                array_push($check, $stok->nama);
            }
        }
        if(count($check) == 0){
            $inputStokRetur = [];
            foreach ($barangRetur as $br) {
                $stok = Stok::where('barang_id', $br->barang_id)->first();
                $stokBaru = $stok->stok - $br->jumlah;
                $this->kartuStokReturBarangRepository->create([
                    'barang_id' => $br->barang_id,
                    'retur_barang_id' => $returBarang->retur_barang_id,
                    'stok_awal' => $stok->stok,
                    'retur' => $br->jumlah,
                    'stok_akhir' => $stokBaru,
                    'tanggal' => date("Y-m-d H:i:s")
                ]);

                $this->rekapStokRepository->create([
                    'barang_id' => $br->barang_id,
                    'stok_awal' => $stok->stok,
                    'masuk' => 0,
                    'keluar' => $br->jumlah,
                    'stok_akhir' => $stokBaru,
                ]);

                Stok::where('barang_id', $br->barang_id)->update(array('stok' => $stokBaru));
            }

            $tanggalRetur = date('Y-m-d H:i:s');

            $lastRecord = PenerimaanRetur::where('id', '!=', $id)->where('kode', '!=', null)->orderBy('tanggal', 'desc')->first();

            // dd($lastRecord);

            if(empty($lastRecord)){
                $kode = 'PR-'.date('ym').'-'.'0000';
                PenerimaanRetur::where('id', $id)->update(array('kode' => $kode, 'status' => 'Diterima', 'tanggal' => $tanggalRetur));
            }else{
                $kodeOld = explode('-', $lastRecord->kode);
                if(count($kodeOld) == 3){
                    if($kodeOld[1] == date('ym')){
                        $noUrut = intval($kodeOld[2]) + 1;
                        $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                        $kode = 'PR-'.date('ym').'-'.$no;
                    }else{
                        $kode = 'PR-'.date('ym').'-'.'0000';
                    }
                }else{
                    $kode = "PR-".date("ym").'-0000';
                }
                PenerimaanRetur::where('id', $id)->update(array('kode' => $kode, 'status' => 'Diterima', 'tanggal' => $tanggalRetur));
            }
            // $kartuStokRetur = $this->kartuStokReturBarangRepository->insert($inputStokRetur);
            ReturBarang::where('id', $returBarang->retur_barang_id)->update(array('status' => "Diterima"));
            Flash::success('Berhasil menerima retur barang.');
            return redirect(route('penerimaanRetur.index'));
        }else{
            $namabarang = '';
            foreach($check as $row){
                $namabarang .= $row.',';
            }
            echo $namabarang;
            // var_dump($check);
            Flash::error($namabarang.' Jumlah yang di retur melebihi stok');
            return redirect(route('penerimaanRetur.index'));
        }
    }
}
