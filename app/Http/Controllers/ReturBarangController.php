<?php

namespace App\Http\Controllers;

use App\DataTables\ReturBarangDataTable;
use App\Models\ReturBarang;
use App\Models\BarangRetur;
use App\Models\Stok;
use App\Http\Requests;
use App\Http\Requests\CreateReturBarangRequest;
use App\Http\Requests\UpdateReturBarangRequest;
use App\Repositories\ReturBarangRepository;
use App\Repositories\PegawaiRepository;
use App\Repositories\KartuStokReturBarangRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ReturBarangController extends AppBaseController
{
    /** @var  ReturBarangRepository */
    private $returBarangRepository;
    private $kartuStokReturBarangRepository;

    public function __construct(
        ReturBarangRepository $returBarangRepo,
        KartuStokReturBarangRepository $kartuStokReturBarangRepo,
        PegawaiRepository $pegawai)
    {
        $this->pegawaiRepository = $pegawai;
        $this->returBarangRepository = $returBarangRepo;
        $this->kartuStokReturBarangRepository = $kartuStokReturBarangRepo;
    }

    /**
     * Display a listing of the ReturBarang.
     *
     * @param ReturBarangDataTable $returBarangDataTable
     * @return Response
     */
    public function index(ReturBarangDataTable $returBarangDataTable)
    {
        return $returBarangDataTable->render('retur_barang.index');
    }

    /**
     * Show the form for creating a new ReturBarang.
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
        return view('retur_barang.create', $data);
    }

    /**
     * Store a newly created ReturBarang in storage.
     *
     * @param CreateReturBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateReturBarangRequest $request)
    {
        $input = $request->all();

        $returBarang = $this->returBarangRepository->create($input);

        Flash::success('Retur Barang saved successfully.');

        return redirect(route('returBarang.index'));
    }

    /**
     * Display the specified ReturBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $data['returBarang'] = ReturBarang::join('supplier', 'supplier.id', '=', 'retur_barang.supplier_id')
                                  ->join('pegawai', 'pegawai.id', '=', 'retur_barang.pegawai_id')
                                  ->select('retur_barang.*', 'supplier.nama AS nama_supplier', 'pegawai.nama as nama_pegawai')
                                  ->where('retur_barang.id', $id)
                                  ->first();

        $data['barangRetur'] = BarangRetur::join('barang', 'barang.id', '=', 'barang_retur.barang_id')
                                    ->join('harga', 'harga.barang_id', '=', 'barang_retur.barang_id')
                                    ->select('barang_retur.*', 'barang.nama', 'harga.harga')
                                    ->where('barang_retur.retur_barang_id', $id)
                                    ->get();

        // echo json_encode($returBarang);
        if (empty($data['returBarang'])) {
            Flash::error('Retur Barang not found');

            return redirect(route('returBarang.index'));
        }

        return view('retur_barang.show', $data);
    }

    /**
     * Show the form for editing the specified ReturBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
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
        $data['returBarang'] = $this->returBarangRepository->find($id);
        $data['barangRetur'] = BarangRetur::join('barang', 'barang.id', '=', 'barang_retur.barang_id')
                                            ->join('stok', 'stok.barang_id', '=', 'barang_retur.barang_id')
                                            ->join('harga', 'harga.barang_id', '=', 'barang_retur.barang_id')
                                            ->select('barang_retur.*', 'stok.stok', 'harga.harga', 'barang.nama')
                                            ->where('barang_retur.retur_barang_id', $id)
                                            ->get();
        if (empty($data['returBarang'])) {
            Flash::error('Retur Barang not found');

            return redirect(route('returBarang.index'));
        }

        return view('retur_barang.edit', $data);
    }

    /**
     * Update the specified ReturBarang in storage.
     *
     * @param  int              $id
     * @param UpdateReturBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReturBarangRequest $request)
    {
        $returBarang = $this->returBarangRepository->find($id);

        if (empty($returBarang)) {
            Flash::error('Retur Barang not found');

            return redirect(route('returBarang.index'));
        }

        $returBarang = $this->returBarangRepository->update($request->all(), $id);

        Flash::success('Retur Barang updated successfully.');

        return redirect(route('returBarang.index'));
    }

    /**
     * Remove the specified ReturBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $returBarang = $this->returBarangRepository->find($id);

        if (empty($returBarang)) {
            Flash::error('Retur Barang not found');

            return redirect(route('returBarang.index'));
        }

        BarangRetur::where('retur_barang_id', $id)->delete();

        $this->returBarangRepository->delete($id);

        Flash::success('Retur Barang deleted successfully.');

        return redirect(route('returBarang.index'));
    }

    public function updateReturBarang($id){
        $returBarang = $this->returBarangRepository->find($id);
        $barangRetur = BarangRetur::where('retur_barang_id', $id)->get();
        $check = [];
        // foreach ($barangRetur as $br) {
        //     $stok = Stok::join('barang', 'barang.id', '=', 'stok.barang_id')->select('stok.*', 'barang.nama')->where('barang_id', $br->barang_id)->first();
        //     if($stok->stok >= $br->jumlah){

        //     }else{
        //         array_push($check, $stok->nama);
        //     }
        // }
        // if(count($check) == 0){
        //     $inputStokRetur = [];
            // foreach ($barangRetur as $br) {
            //     $stok = Stok::where('barang_id', $br->barang_id)->first();
            //     $stokBaru = $stok->stok - $br->jumlah;
            //     array_push($inputStokRetur, ['barang_id' => $br->barang_id, 'retur_barang_id' => $id, 'stok_awal' => $stok->stok, 'retur' => $br->jumlah, 'stok_akhir' => $stokBaru, 'tanggal' => date("Y-m-d H:i:s")]);
            //     Stok::where('barang_id', $br->barang_id)->update(array('stok' => $stokBaru));
            // }
            $tanggalRetur = date('Y-m-d H:i:s');
            $lastRecord = ReturBarang::where('id', '!=', $id)->where('kode', '!=', null)->orderBy('tanggal', 'desc')->first();
            if(empty($lastRecord)){
                $kode = 'RB-'.date('ym').'-'.'0000';
                ReturBarang::where('id', $id)->update(array('kode' => $kode, 'status' => 'Diretur', 'tanggal' => $tanggalRetur));
            }else{
                $kodeOld = explode('-', $lastRecord->kode);
                if($kodeOld[1] == date('ym')){
                    $noUrut = intval($kodeOld[2]) + 1;
                    $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                    $kode = 'RB-'.date('ym').'-'.$no;
                }else{
                    $kode = 'RB-'.date('ym').'-'.'0000';
                }
                ReturBarang::where('id', $id)->update(array('kode' => $kode, 'status' => 'Diretur', 'tanggal' => $tanggalRetur));
            }
            // $kartuStokRetur = $this->kartuStokReturBarangRepository->insert($inputStokRetur);

            Flash::success('Retur Barang successfully.');
            return redirect(route('returBarang.index'));
        // }else{
        //     $namabarang = '';
        //     foreach($check as $row){
        //         $namabarang .= $row.',';
        //     }
        //     echo $namabarang;
        //     // var_dump($check);
        //     Flash::error($namabarang.' Jumlah yang di retur melebihi stok');
        //     return redirect(route('returBarang.index'));
        // }
    }
}
