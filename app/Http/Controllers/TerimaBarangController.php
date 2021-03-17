<?php

namespace App\Http\Controllers;

use App\DataTables\TerimaBarangDataTable;
use App\Http\Requests;
use App\Models\DetailPurchaseOrder;
use App\Models\PurchaseOrder;
use App\Models\TerimaBarang;
use App\Models\BarangTerima;
use App\Models\BarangKirim;
use App\Models\KirimBarang;
use App\Models\Stok;
use App\Http\Requests\CreateTerimaBarangRequest;
use App\Http\Requests\UpdateTerimaBarangRequest;
use App\Repositories\TerimaBarangRepository;
use App\Repositories\KartuStokTerimaBarangRepository;
use App\Repositories\BarangTerimaRepository;
use App\Repositories\PegawaiRepository;
use App\Repositories\RekapStokRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TerimaBarangController extends AppBaseController
{
    /** @var  TerimaBarangRepository */
    private $terimaBarangRepository;
    private $kartuStokTerimaBarangRepository;
    private $rekapStokRepository;

    public function __construct(
        TerimaBarangRepository $terimaBarangRepo,
        KartuStokTerimaBarangRepository $kartuStokTerimaBarangRepo,
        RekapStokRepository $rekapStokRepo,
        PegawaiRepository $pegawai)
    {
        $this->pegawaiRepository = $pegawai;
        $this->terimaBarangRepository = $terimaBarangRepo;
        $this->kartuStokTerimaBarangRepository = $kartuStokTerimaBarangRepo;
        $this->rekapStokRepository = $rekapStokRepo;
    }

    /**
     * Display a listing of the TerimaBarang.
     *
     * @param TerimaBarangDataTable $terimaBarangDataTable
     * @return Response
     */
    public function index(TerimaBarangDataTable $terimaBarangDataTable)
    {
        return $terimaBarangDataTable->render('terima_barang.index');
    }

    /**
     * Show the form for creating a new TerimaBarang.
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
        return view('terima_barang.create', $data);
    }

    /**
     * Store a newly created TerimaBarang in storage.
     *
     * @param CreateTerimaBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateTerimaBarangRequest $request)
    {
        $input = $request->all();

        $terimaBarang = $this->terimaBarangRepository->create($input);

        Flash::success('Terima Barang saved successfully.');

        return redirect(route('terimaBarang.index'));
    }

    /**
     * Display the specified TerimaBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $data['terimaBarang'] = TerimaBarang::join('purchase_order', 'terima_barang.purchase_order_id', '=', 'purchase_order.id')
                                            ->join('supplier', 'terima_barang.supplier_id', '=', 'supplier.id')
                                            ->join('kirim_barang', 'terima_barang.kirim_barang_id', '=', 'kirim_barang.id')
                                            ->join('pegawai', 'terima_barang.pegawai_id', '=', 'pegawai.id')
                                            ->select('purchase_order.kode AS kode_po','pegawai.nama as pegawai','kirim_barang.kode AS kode_kb',  'supplier.nama AS nama_supplier', 'terima_barang.*')
                                            ->where('terima_barang.id', '=', $id)
                                            ->first();

        $data['barangTerima'] = BarangTerima::join('barang', "barang.id", "=", "barang_terima.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")
                                        ->select('barang.nama', 'barang_terima.*', "harga.harga")
                                        ->where('barang_terima.terima_barang_id', '=', $id)
                                        ->where('harga.deleted_at', '=', null)
                                        ->get();

        $idkb = $data['terimaBarang']->kirim_barang_id;
        $data['barangKirim'] = BarangKirim::join('barang', "barang.id", "=", "barang_kirim.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")
                                        ->select('barang.nama', 'barang_kirim.*', "harga.harga")
                                        ->where('barang_kirim.kirim_barang_id', '=', $idkb)
                                        ->where('harga.deleted_at', '=', null)
                                        ->get();

        if (empty($data['terimaBarang'])) {
            Flash::error('Terima Barang not found');

            return redirect(route('terimaBarang.index'));
        }

        return view('terima_barang.show', $data);
    }

    /**
     * Show the form for editing the specified TerimaBarang.
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
        $data['terimaBarang'] = $this->terimaBarangRepository->find($id);
        $idkb = $data['terimaBarang']->kirim_barang_id;
        $kodeKirim = KirimBarang::where('id', $idkb)->first()->kode;
        $data['terimaBarang']->kodeKirim = $kodeKirim;
        $idtb = $data['terimaBarang']->id;
        $barang = BarangKirim::join('barang', "barang.id", "=", "barang_kirim.barang_id")
                            ->join("harga", "harga.barang_id", "=", "barang.id")
                            ->select('barang.nama', 'barang_kirim.*', "harga.harga")
                            ->where('barang_kirim.kirim_barang_id', '=', $idkb)
                            ->where('harga.deleted_at', '=', null)
                            ->get();
        $array = [];

        foreach ($barang as $b){
            $bhasil  = BarangTerima::join('barang', "barang.id", "=", "barang_terima.barang_id")
                                    ->join("harga", "harga.barang_id", "=", "barang.id")
                                    ->select('barang.nama', 'barang_terima.*', "harga.harga")
                                    ->where('barang_terima.terima_barang_id', '=', $id)
                                    ->where('barang_terima.barang_id', '=', $b->barang_id)
                                    ->where('harga.deleted_at', '=', null)
                                    ->first();


            if(!empty($bhasil)){
                $b->checked = true;
                $b->jumlah_kurang = $bhasil->jumlah;
                array_push($array, $b);
            }else{
                $b->checked = false;
                array_push($array, $b);
            }
        }

        $data['barang'] = $array;
        // echo json_encode($array);
        if (empty($data['terimaBarang'])) {
            Flash::error('Terima Barang not found');

            return redirect(route('terimaBarang.index'));
        }

        return view('terima_barang.edit', $data);
    }

    /**
     * Update the specified TerimaBarang in storage.
     *
     * @param  int              $id
     * @param UpdateTerimaBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTerimaBarangRequest $request)
    {
        $terimaBarang = $this->terimaBarangRepository->find($id);

        if (empty($terimaBarang)) {
            Flash::error('Terima Barang not found');

            return redirect(route('terimaBarang.index'));
        }

        $terimaBarang = $this->terimaBarangRepository->update($request->all(), $id);

        Flash::success('Terima Barang updated successfully.');

        return redirect(route('terimaBarang.index'));
    }

    /**
     * Remove the specified TerimaBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $terimaBarang = $this->terimaBarangRepository->find($id);

        if (empty($terimaBarang)) {
            Flash::error('Terima Barang not found');

            return redirect(route('terimaBarang.index'));
        }

        BarangTerima::where('terima_barang_id', $id)->delete();

        BarangKirim::where('kirim_barang_id', $terimaBarang->kirim_barang_id)->where('status', 'close')->where('jumlah_kurang', '!=', '0')->update(array('status' => 'open'));

        $this->terimaBarangRepository->delete($id);

        Flash::success('Terima Barang deleted successfully.');

        return redirect(route('terimaBarang.index'));
    }

    public function updateTerimaBarang($id){
        $terimaBarang = $this->terimaBarangRepository->find($id);
        $idkb = $terimaBarang->kirim_barang_id;
        $barangkb = BarangKirim::where('kirim_barang_id', '=', $idkb)->get();
        $inputStokTerima = [];
        // // echo json_encode($barangkb);
        foreach ($barangkb as $bk) {
            $bt = BarangTerima::where('terima_barang_id', $id)->where('barang_id', $bk->barang_id)->first();
            if(!empty($bt)){
                $jumlah_kurang = $bk->jumlah_kurang - $bt->jumlah;
                $stok = Stok::where('barang_id', $bt->barang_id)->first();
                $stokBaru = $stok->stok + $bt->jumlah;
                $this->rekapStokRepository->create([
                    'barang_id' => $bt->barang_id,
                    'stok_awal' => $stok->stok,
                    'masuk' => $bt->jumlah,
                    'keluar' => '0',
                    'stok_akhir' => $stokBaru
                ]);
                $this->kartuStokTerimaBarangRepository->create([
                    'barang_id' => $bt->barang_id,
                    'terima_barang_id' => $id,
                    'stok_awal' => $stok->stok,
                    'masuk' => $bt->jumlah,
                    'keluar' => '0',
                    'stok_akhir' => $stokBaru,
                    'tanggal' => date('Y-m-d H:i:s')
                ]);
                Stok::where('barang_id', $bt->barang_id)->update(array('stok' => $stokBaru));
                BarangKirim::where('id',$bk->id)->where('barang_id', $bk->barang_id)->update(array('jumlah_kurang' => $jumlah_kurang));
            }
        }

        KirimBarang::where('id', $idkb)->update(array('status' => 'Close'));

        $barangKirim = BarangKirim::where('kirim_barang_id', $idkb)->where('jumlah_kurang', '!=', '0')->get();
        $KirimBarang = KirimBarang::where('id', $idkb)->first();
        if(!empty($barangKirim)){
            // echo json_encode($KirimBarang);
            foreach ($barangKirim as $bk) {
                // echo $bk->jumlah_kurang;
                // echo "<br>";
                $dpo = DetailPurchaseOrder::where('purchase_order_id', $KirimBarang->purchase_order_id)->where('barang_id', $bk->barang_id)->first();
                if(strtolower($dpo->status) == 'close' && $dpo->jumlah_kurang == '0'){
                    DetailPurchaseOrder::where('purchase_order_id', $KirimBarang->purchase_order_id)->where('barang_id', $bk->barang_id)->update(array('jumlah_kurang' => $bk->jumlah_kurang, 'status' => 'open'));
                }elseif(strtolower($dpo->status) == 'close' && $dpo->jumlah_kurang > 0){
                    $jumlahKurangBaru = $bk->jumlah_kurang + $dpo->jumlah_kurang;
                    DetailPurchaseOrder::where('purchase_order_id', $KirimBarang->purchase_order_id)->where('barang_id', $bk->barang_id)->update(array('jumlah_kurang' => $jumlahKurangBaru));
                }elseif (strtolower($dpo->status) == 'open') {
                    $jumlahKurangBaru = $bk->jumlah_kurang + $dpo->jumlah_kurang;
                    DetailPurchaseOrder::where('purchase_order_id', $KirimBarang->purchase_order_id)->where('barang_id', $bk->barang_id)->update(array('jumlah_kurang' => $jumlahKurangBaru));
                }
            }
            $po = PurchaseOrder::where('id', $KirimBarang->purchase_order_id)->first();
            $dpoBaru = DetailPurchaseOrder::where('purchase_order_id', $po->id)->where('status', 'open')->where('jumlah_kurang', '!=', '0')->get()->count();
            if($dpoBaru != 0){
                PurchaseOrder::where('id', $KirimBarang->purchase_order_id)->update(array('status' => 'Diprosess'));
            }
        }

        $lastRecord = TerimaBarang::where('id', '!=', $id)->where('kode', '!=', null)->orderBy('tanggal_terima', 'desc')->first();
        if(empty($lastRecord)){
            $kode = 'TB-'.date('ym').'-'.'0000';
            TerimaBarang::where('id', $id)->update(array('kode' => $kode,'status' => 'Diterima', 'tanggal_terima' => date('Y-m-d H:i:s')));
        }else{
            $kodeOld = explode('-', $lastRecord->kode);
            if($kodeOld[1] == date('ym')){
                $noUrut = intval($kodeOld[2]) + 1;
                $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                $kode = 'TB-'.date('ym').'-'.$no;
            }else{
                $kode = 'TB-'.date('ym').'-'.'0000';
            }
            TerimaBarang::where('id', $id)->update(array('kode' => $kode, 'status' => "Diterima", 'tanggal_terima' => date('Y-m-d H:i:s')));
        }

        // $saveKartuStokTerimaBarang = $this->kartuStokTerimaBarangRepository->insert($inputStokTerima);

        Flash::success('Terima Barang successfully.');

        return redirect(route('terimaBarang.index'));
    }


}
