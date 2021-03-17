<?php

namespace App\Http\Controllers;

use App\DataTables\PenjualanDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Repositories\PenjualanRepository;
use App\Repositories\BarangRepository;
use App\Repositories\BarangPenjualanRepository;
use App\Repositories\ParameterRepository;
use App\Repositories\PoinRepository;
use App\Repositories\BintangRepository;
use App\Repositories\StokRepository;
use App\Repositories\LogPoinRepository;
use App\Repositories\LogBintangRepository;
use App\Repositories\KartuStokPenjualanRepository;
use App\Repositories\RekapStokRepository;
use App\Repositories\MitraRepository;
use App\Repositories\PelangganRepository;
use App\Repositories\BarangPromoRepository;
use App\Repositories\PromoRepository;
use App\Repositories\PegawaiRepository;
use App\Repositories\ReferralRepository;
use App\Repositories\BonusRepository;
use App\Repositories\LogBonusRepository;
use App\Repositories\PrinterRepository;
use Illuminate\Routing\UrlGenerator;
use App\Models\Penjualan;
use App\Models\BarangPenjualan;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Exports\PenjualanExport;
use App\Exports\OmsetExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class PenjualanController extends AppBaseController
{
    /** @var  PenjualanRepository */
    private $penjualanRepository;
    private $barangRepository;
    private $barangPenjualanRepository;
    private $parameterRepository;
    private $poinRepository;
    private $bintangRepository;
    private $stokRepository;
    private $logPoinRepository;
    private $logBintangRepository;
    private $kartuStokPenjualanRepository;
    private $mitraRepository;
    private $pelangganRepository;
    private $rekapStokRepository;
    private $barangPromoRepository;
    private $promoRepository;

    public function __construct(
        PenjualanRepository $penjualanRepo,
        BarangRepository $barangRepo,
        BarangPenjualanRepository $barangPenjualanRepo,
        ParameterRepository $parameterRepo,
        PoinRepository $poinRepo,
        BintangRepository $bintangRepo,
        StokRepository $stokRepo,
        LogPoinRepository $logPoinRepo,
        LogBintangRepository $logBintangRepo,
        KartuStokPenjualanRepository $kartuStokPenjualanRepo,
        MitraRepository $mitraRepo,
        PelangganRepository $pelangganRepo,
        RekapStokRepository $rekapStokRepo,
        BarangPromoRepository $barangPromoRepo,
        PromoRepository $promoRepo,
        ReferralRepository $referral,
        BonusRepository $bonus,
        LogBonusRepository $logBonus,
        PrinterRepository $printerRepo,
        UrlGenerator $url,
        PegawaiRepository $pegawai
    )
    {
        $this->penjualanRepository = $penjualanRepo;
        $this->barangRepository = $barangRepo;
        $this->barangPenjualanRepository = $barangPenjualanRepo;
        $this->parameterRepository = $parameterRepo;
        $this->poinRepository = $poinRepo;
        $this->bintangRepository = $bintangRepo;
        $this->stokRepository = $stokRepo;
        $this->logPoinRepository = $logPoinRepo;
        $this->logBintangRepository = $logBintangRepo;
        $this->kartuStokPenjualanRepository = $kartuStokPenjualanRepo;
        $this->mitraRepository = $mitraRepo;
        $this->pelangganRepository = $pelangganRepo;
        $this->rekapStokRepository = $rekapStokRepo;
        $this->barangPromoRepository = $barangPromoRepo;
        $this->promoRepository = $promoRepo;
        $this->referralRepository = $referral;
        $this->bonusRepository = $bonus;
        $this->logBonusRepository = $logBonus;
        $this->printerRepository = $printerRepo;
        $this->url = $url;
        $this->pegawaiRepository = $pegawai;
    }

    /**
     * Display a listing of the Penjualan.
     *
     * @param PenjualanDataTable $penjualanDataTable
     * @return Response
     */
    public function index(PenjualanDataTable $penjualanDataTable)
    {
        return $penjualanDataTable->render('penjualan.index');
    }

    public function laporan(Request $request)
    {
        $data = [];

        if((!empty($request->input('s')) && !empty($request->input('f')) && !empty($request->input('t')) )){
            $data['penjualan'] = $this->penjualanRepository->getPenjualan($request->input('s'), $request->input('f'), $request->input('t'));
        }

        return view('penjualan.laporan', $data);
    }

    public function exportLaporan(Request $request)
    {
      if( !empty($request->input('s')) && !empty($request->input('f')) && !empty($request->input('t')) ){
        $timestamp = Carbon::now()->format('dmYHis');
        if (Auth::user()->hasRole('mitra')) {
          $mitra = $this->mitraRepository->find(Auth::user()->id);
          $pelanggan = $this->pelangganRepository->find($mitra->pelanggan_id);
          $timestamp = $pelanggan->nama."_".$timestamp;
        }
        return Excel::download(new PenjualanExport( $request->input('s'), $request->input('f'), $request->input('t')), 'penjualan_' . $timestamp . '.xlsx');
      }
    }
    /**
     * Show the form for creating a new Penjualan.
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

        // echo json_encode($data);
        // die();
        return view('penjualan.create', $data);
    }

    /**
     * Store a newly created Penjualan in storage.
     *
     * @param CreatePenjualanRequest $request
     *
     * @return Response
     */
    public function store(CreatePenjualanRequest $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = $request->all();

        $lastRowPenjualan = $this->penjualanRepository->allQuery()->orderBy('created_at', 'desc')->first();

        if(empty($lastRowPenjualan)){
            $input['kode'] = "PJ-".date("ym").'-0000';
        }else{
            $kode = explode('-', $lastRowPenjualan->kode);
            if($kode[1] == date("ym")){
                $no = intval($kode[2]) + 1;
                $noUrut = str_pad($no,4,"0", STR_PAD_LEFT);
                $input['kode'] = "PJ-".date("ym").'-'.$noUrut;
            }else{
              $input['kode'] = "PJ-".date("ym").'-0000';
            }
        }

        if (!empty($input['mitra_id'])) {
            $pelanggan_id = $this->mitraRepository->find($input['mitra_id']);
            $input['pelanggan_id'] = $pelanggan_id->pelanggan_id;
        }

        $penjualan = $this->penjualanRepository->create($input);

        $subtotal = 0;

        $kartuPenjualan = [];

        foreach ($input['barang_penjualan'] as $index => $id_barang) {
            $tipe = $this->barangRepository->find($id_barang);
            if($tipe->tipe == 'Reguler'){
                $barang = $this->barangRepository->getStokHarga($id_barang)->first();
                $jumlahBarang = $input['jumlah_barang_penjualan'][$index];
                $hargaBarang = $barang->harga;
                $hargaDiskon = 0;
                if($input['diskon'][$index] == "true"){
                    if($barang->tipe_diskon == "persen"){
                        $hargaDiskon = $barang->harga - ($barang->diskon / 100 * $barang->harga);
                        $subtotal = $barang->harga - ($barang->diskon / 100 * $barang->harga);
                    }else if($barang->tipe_diskon == "rupiah"){
                        $hargaDiskon = $barang->harga - $barang->diskon;
                        $subtotal = $barang->harga - $barang->diskon;
                    }
                }else if($input['diskon'][$index] == "false"){
                    $subtotal = $barang->harga;
                }

                $this->barangPenjualanRepository->create([
                    'penjualan_id' => $penjualan->id,
                    'barang_id' => $barang->id,
                    'harga' => $hargaDiskon,
                    'jumlah' => $jumlahBarang,
                    'subtotal' => $jumlahBarang * $subtotal
                ]);

                $subtotal += $jumlahBarang * $hargaBarang;
            }else if($tipe->tipe == 'Paket'){
                $paket = $this->promoRepository->getPromoByBarangId($id_barang);
                $barangPaket = $this->barangPromoRepository->getBarangPromoByPromoId($paket->id);
                $jumlahBarang = $input['jumlah_barang_penjualan'][$index];
                $hargaBarang = $this->barangRepository->getHarga($id_barang)->harga;

                $this->barangPenjualanRepository->create([
                    'penjualan_id' => $penjualan->id,
                    'barang_id' => $id_barang,
                    'harga' => $hargaBarang,
                    'jumlah' => $jumlahBarang,
                    'subtotal' => $jumlahBarang * $hargaBarang
                ]);
            }
        }

        Flash::success('Penjualan saved successfully.');

        return redirect(route('penjualan.create'));
    }

    /**
     * Display the specified Penjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        // $penjualan = $this->penjualanRepository->find($id);

        $data['penjualan'] = Penjualan::join('pelanggan', 'pelanggan.id', '=', 'penjualan.pelanggan_id')
            ->leftJoin('metode_pembayaran', 'penjualan.metode_pembayaran_id', '=', 'metode_pembayaran.id')
            ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
            ->leftJoin('bank', 'penjualan.bank_id', '=', 'bank.id')
            ->select('penjualan.*', 'pelanggan.nama AS nama_pelanggan', 'metode_pembayaran.nama as nama_metode_pembayaran', 'bank.nama as nama_bank', 'voucher.kode as kode_voucher')
            ->where('penjualan.id', $id)
            ->first();

        $data['barangPenjualanReguler'] = BarangPenjualan::join('barang', 'barang.id', '=', 'barang_penjualan.barang_id')
                                          ->join('harga', 'harga.barang_id', '=', 'barang.id')
                                          ->join('stok', 'stok.barang_id', '=', 'barang.id')
                                          ->select('barang_penjualan.*', 'harga.harga', 'stok.stok', 'barang.nama')
                                          ->where('barang_penjualan.penjualan_id', $id)
                                          ->where('barang.tipe', "Reguler")
                                          ->get();

        $data['barangPenjualanPaket'] = BarangPenjualan::join('barang', 'barang.id', '=', 'barang_penjualan.barang_id')
                                          ->join('harga', 'harga.barang_id', '=', 'barang.id')
                                          ->join('stok', 'stok.barang_id', '=', 'barang.id')
                                          ->join('promo', 'promo.barang_id', '=', 'barang.id')
                                          ->select('barang_penjualan.*', 'harga.harga', 'stok.stok', 'barang.nama', 'promo.id as promo_id')
                                          ->where('barang_penjualan.penjualan_id', $id)
                                          ->where('barang.tipe', "Paket")
                                          ->get();
        foreach ($data['barangPenjualanPaket'] as $index => $row) {
            $barangPaket = $this->barangPromoRepository->getBarangPromoByPromoId($row->promo_id);
            $data['barangPenjualanPaket'][$index]->data_paket = $barangPaket;
        }

        if (empty($data['penjualan'])) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualan.index'));
        }

        // echo json_encode($data);
        // die();

        return view('penjualan.show', $data);
    }

    /**
     * Show the form for editing the specified Penjualan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penjualan = $this->penjualanRepository->find($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualan.index'));
        }

        return view('penjualan.edit')->with('penjualan', $penjualan);
    }

    /**
     * Update the specified Penjualan in storage.
     *
     * @param  int              $id
     * @param UpdatePenjualanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenjualanRequest $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $penjualan = $this->penjualanRepository->find($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualan.index'));
        }

        $penjualan = $this->penjualanRepository->update($request->all(), $id);

        Flash::success('Penjualan updated successfully.');

        return redirect(route('penjualan.index'));
    }

    /**
     * Remove the specified Penjualan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penjualan = $this->penjualanRepository->find($id);

        if (empty($penjualan)) {
            Flash::error('Penjualan not found');

            return redirect(route('penjualan.index'));
        }

        $this->penjualanRepository->delete($id);

        Flash::success('Penjualan deleted successfully.');

        return redirect(route('penjualan.index'));
    }

    public function export()
    {
        $timestamp = Carbon::now()->format('dmYHis');

        return Excel::download(new PenjualanExport('2020-11-19', '2020-11-20'), 'penjualan_' . $timestamp . '.xlsx');
    }

    public function laporanOmset(Request $request)
    {
        $data = [];
        if( !empty($request->input('startYear')) ){
            $data['penjualan'] = [];
            $data['omset'] = 0;
            $data['transaksi'] = 0;
            $dataPenjualan = $this->penjualanRepository->getForDashboard( $request->input('startYear') );
            foreach ($dataPenjualan as $row) {
                $month_num = $row->bulan;
                $namaBulan = date("F", mktime(0, 0, 0, $month_num, 10));
                array_push($data['penjualan'], ['bulan' => $namaBulan, 'total' => $row->total, 'transaksi' => $row->transaksi]);
                $data['omset'] += $row->total;
                $data['transaksi'] += $row->transaksi;
            }
        }
        return view('penjualan.omset', $data);
    }

    public function exportLaporanOmset(Request $request)
    {
      $data = [];
      if((!empty($request->input('year')) )){
        $dataPenjualan = $this->penjualanRepository->getForExport( $request->input('year') );
        $timestamp = Carbon::now()->format('dmYHis');
        return Excel::download(new OmsetExport($dataPenjualan), 'omset_' . $timestamp . '.xlsx');
      }
    }

    public function pembayaran()
    {
        $data['data'] = $this->penjualanRepository->getWithWhere(['penjualan.status' => 'Diproses'])->get();
        return view('penjualan.listPembayaran', $data);
    }

    public function lanjutTransaksi($id)
    {
        $data['penjualan'] = Penjualan::join('pelanggan', 'pelanggan.id', '=', 'penjualan.pelanggan_id')
            ->leftJoin('voucher', 'voucher.id', '=', 'penjualan.voucher_id')
            ->select('penjualan.*', 'pelanggan.nama AS nama_pelanggan', 'voucher.kode as kode_voucher')
            ->where('penjualan.id', $id)
            ->first();

        $data['barangPenjualanReguler'] = BarangPenjualan::join('barang', 'barang.id', '=', 'barang_penjualan.barang_id')
                                          ->join('harga', 'harga.barang_id', '=', 'barang.id')
                                          ->join('stok', 'stok.barang_id', '=', 'barang.id')
                                          ->select('barang_penjualan.*', 'harga.harga', 'stok.stok', 'barang.nama')
                                          ->where('barang_penjualan.penjualan_id', $id)
                                          ->where('barang.tipe', "Reguler")
                                          ->get();

        $data['barangPenjualanPaket'] = BarangPenjualan::join('barang', 'barang.id', '=', 'barang_penjualan.barang_id')
                                          ->join('harga', 'harga.barang_id', '=', 'barang.id')
                                          ->join('stok', 'stok.barang_id', '=', 'barang.id')
                                          ->join('promo', 'promo.barang_id', '=', 'barang.id')
                                          ->select('barang_penjualan.*', 'harga.harga', 'stok.stok', 'barang.nama', 'promo.id as promo_id')
                                          ->where('barang_penjualan.penjualan_id', $id)
                                          ->where('barang.tipe', "Paket")
                                          ->get();

        foreach ($data['barangPenjualanPaket'] as $index => $row) {
            $barangPaket = $this->barangPromoRepository->getBarangPromoByPromoId($row->promo_id);
            $data['barangPenjualanPaket'][$index]->data_paket = $barangPaket;
        }

        if(!empty($data['penjualan']->mitra_id)){
            $bonus = $this->bonusRepository->allQuery(['mitra_id' => $data['penjualan']->mitra_id])->first();
            if(empty($bonus)){
                $data['bonus'] = 0;
            }else{
                $data['bonus'] = $bonus->bonus;
            }
        }

        if (empty($data['penjualan'])) {
            Flash::error('Penjualan not found');

            return redirect(route('pembayaran'));
        }

        return view('penjualan.pembayaran', $data);
    }

    public function updatePenjualan($id, Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $input = $request->all();

        $penjualan = $this->penjualanRepository->find($id);
        $barangPenjualan = $this->barangPenjualanRepository->allQuery(['penjualan_id' => $id])->get();
        $subtotal = 0;

        $kartuPenjualan = [];

        foreach ($barangPenjualan as $row) {
            $tipe = $this->barangRepository->find($row->barang_id);
            if($tipe->tipe == 'Reguler'){
                $stok = $this->barangRepository->getStok($row->barang_id)->stok;
                if($row->jumlah > $stok){
                    Flash::error('Ada barang yang stok nya habis.');
                    return redirect(route('pembayaran'));
                }
             }else if($tipe->tipe == 'Paket'){
                $paket = $this->promoRepository->getPromoByBarangId($row->barang_id);
                $barangPaket = $this->barangPromoRepository->getBarangPromoByPromoId($paket->id);

                // proses stok barang paket
                foreach($barangPaket as $rowPaket){
                    $stok = $this->barangRepository->getStok($rowPaket->barang_id)->stok;
                    if($row->jumlah > $stok){
                        Flash::error('Ada barang yang stok nya habis.');
                        return redirect(route('pembayaran'));
                    }
                }
            }
        }

        foreach ($barangPenjualan as $row) {
            $tipe = $this->barangRepository->find($row->barang_id);
            if($tipe->tipe == 'Reguler'){
                $barang = $this->barangRepository->getStokHarga($row->barang_id)->first();
                $jumlahBarang = $row->jumlah;
                $hargaBarang = $barang->harga;

                // proses stok barang reguler
                $stokTersedia = $barang->stok;
                $stokSekarang = $stokTersedia - $jumlahBarang;

                if ($stokSekarang < 0) {
                    $stokSekarang = 0;
                }

                $this->kartuStokPenjualanRepository->create([
                    'barang_id' => $barang->id,
                    'penjualan_id' => $penjualan->id,
                    'stok_awal' => $barang->stok,
                    'masuk' => '0',
                    'keluar' => $jumlahBarang,
                    'stok_akhir' => $stokSekarang,
                    'tanggal' => date('Y-m-d H:i:s'),
                ]);

                $this->rekapStokRepository->create([
                    'barang_id' => $barang->id,
                    'stok_awal' => $barang->stok,
                    'masuk' => '0',
                    'keluar' => $jumlahBarang,
                    'stok_akhir' => $stokSekarang,
                ]);

                $this->stokRepository->update(['stok' => $stokSekarang], $barang->id);

            }else if($tipe->tipe == 'Paket'){
                $paket = $this->promoRepository->getPromoByBarangId($row->barang_id);
                $barangPaket = $this->barangPromoRepository->getBarangPromoByPromoId($paket->id);
                $jumlahBarang = $row->jumlah;
                $hargaBarang = $this->barangRepository->getHarga($row->barang_id)->harga;

                // proses stok barang paket
                foreach($barangPaket as $rowPaket){
                    $hargaBarangPaket = $this->barangRepository->getHarga($rowPaket->barang_id)->harga;
                    $stokBarangPaket = $this->barangRepository->getStok($rowPaket->barang_id)->stok;
                    $subtotal += $rowPaket->jumlah * $hargaBarangPaket;

                    // proses stok
                    $stokTersedia = $stokBarangPaket;
                    $stokSekarang = $stokTersedia - $rowPaket->jumlah;

                    if ($stokSekarang < 0) {
                        $stokSekarang = 0;
                    }

                    $this->kartuStokPenjualanRepository->create([
                        'barang_id' => $rowPaket->barang_id,
                        'penjualan_id' => $penjualan->id,
                        'stok_awal' => $stokBarangPaket,
                        'masuk' => '0',
                        'keluar' => $rowPaket->jumlah,
                        'stok_akhir' => $stokSekarang,
                        'tanggal' => date('Y-m-d H:i:s'),
                    ]);

                    $this->rekapStokRepository->create([
                        'barang_id' => $rowPaket->barang_id,
                        'stok_awal' => $stokBarangPaket,
                        'masuk' => '0',
                        'keluar' => $rowPaket->jumlah,
                        'stok_akhir' => $stokSekarang,
                    ]);

                    $this->stokRepository->update(['stok' => $stokSekarang], $row->barang_id);
                }
            }
        }

        $input['status'] = "Dibayar";
        $input['total'] = $input['bayar'];
        $updatePenjualan = $this->penjualanRepository->update($input, $id);

        if(!empty($updatePenjualan->mitra_id)){
            // proses poin dan bintang
            $kursPoin = $this->parameterRepository->allQuery(['key' => 'kurs_poin'])->first();
            $kursBintang = $this->parameterRepository->allQuery(['key' => 'kurs_bintang'])->first();
            $kursBonus = $this->parameterRepository->allQuery(['key' => 'kurs_bonus'])->first();

            $dataPoin = $this->poinRepository->allQuery(['mitra_id' => $penjualan->mitra_id])->first();
            $dataBintang = $this->bintangRepository->allQuery(['mitra_id' => $penjualan->mitra_id])->first();

            $referral = $this->referralRepository->allQuery(['child_id' => $penjualan->mitra_id])->first();
            $bonusMitra = $this->penjualanRepository->allQuery(['mitra_id' => $penjualan->mitra_id])->get();

            $totalforPoin = $penjualan->total - $penjualan->ongkir;

            if(!empty($referral)){
                if(count($bonusMitra) == 1){
                    $bonusMitra = ( intval($kursBonus->value) / 100 * intval($totalforPoin) );
                    $bonus = $this->bonusRepository->allQuery(['mitra_id' => $referral->parent_id])->first();

                    $this->logBonusRepository->create([
                        'mitra_id' => $referral->parent_id,
                        'keterangan' => 'Bonus',
                        'jumlah' => $bonusMitra,
                        'kode_transaksi' => $updatePenjualan->kode,
                        'nama_referral' => $referral->child_id,
                    ]);

                    if(empty($bonus)){
                        $this->bonusRepository->create([
                            'mitra_id' => $referral->parent_id,
                            'bonus' => $bonusMitra
                        ]);
                    }else{
                        $bonusMitra += intval($bonus->bonus);
                        $this->bonusRepository->update([
                            'mitra_id' => $referral->parent_id,
                            'bonus' => $bonusMitra
                        ], $bonus->id);
                    }
                }
            }

            $poin = floor($totalforPoin / $kursPoin->value);
            $bintang = floor($totalforPoin / $kursBintang->value);

            if (empty($dataPoin)) {
                $this->poinRepository->create([
                    'mitra_id' => $penjualan->mitra_id,
                    'poin' => $poin
                ]);
            } else {
                $this->poinRepository->update([
                    'mitra_id' => $penjualan->mitra_id,
                    'poin' => $dataPoin->poin + $poin
                ], $dataPoin->id);
            }

            $this->logPoinRepository->create([
                'mitra_id' => $penjualan->mitra_id,
                'keterangan' => 'Transaksi',
                'jumlah' => $poin
            ]);

            if (empty($dataBintang)) {
                $this->bintangRepository->create([
                    'mitra_id' => $penjualan->mitra_id,
                    'bintang' => $bintang
                ]);
            } else {
                $this->bintangRepository->update([
                    'mitra_id' => $penjualan->mitra_id,
                    'bintang' => $dataBintang->bintang + $bintang
                ], $dataBintang->id);
            }

            $this->logBintangRepository->create([
                'mitra_id' => $penjualan->mitra_id,
                'keterangan' => 'Transaksi',
                'jumlah' => $bintang
            ]);
        }

        if(!empty($input['bonus'])){
            $bonus = $this->bonusRepository->allQuery(['mitra_id' => $updatePenjualan->mitra_id])->first();

            $this->logBonusRepository->create([
                'mitra_id' => $updatePenjualan->mitra_id,
                'keterangan' => 'Potongan Pembayaran Transaksi',
                'jumlah' => $input['bonus'],
                'kode_transaksi' => $updatePenjualan->kode
            ]);

            $bonusMitra = $bonus->bonus -= intval($input['bonus']);

            $this->bonusRepository->update([
                'mitra_id' => $updatePenjualan->mitra_id,
                'bonus' => $bonusMitra
            ], $bonus->id);
        }

        // $this->printStruk($id);

        Flash::success('Penjualan saved successfully.');

        echo '<script>
                    window.onload = () => {
                        window.open("'.$this->url->to('printPopUp/'.$id).'");
                        window.location = "'.$this->url->to('pembayaran/').'"
                    };
            </script>';


        // return redirect(route('pembayaran'));
    }

    public function printStruk($id){
        try {
            $barangPenjualan = $this->barangPenjualanRepository->allQuery(['penjualan_id' => $id])->get();
            $penjualan = $this->penjualanRepository->getWithWhere(['penjualan.id' => $id])->first();
            $defaultPrinter = $this->printerRepository->allQuery(['default' => 1])->first();

            $diskonRupiah = 0;
            $diskonPersen = 0;

            if($penjualan->tipe_voucher == 'rupiah'){
                $diskonRupiah += $penjualan->diskon_voucher;
            }else if($penjualan->tipe_voucher == 'persen'){
                $diskonPersen += $penjualan->diskon_voucher;
            }

            $connector = new WindowsPrintConnector($defaultPrinter->nama);
            $printer = new Printer($connector);
            $logo = EscposImage::load("logo.png");

            function buatBaris4Kolom($kolom1, $kolom2, $kolom3, $kolom4) {
                // Mengatur lebar setiap kolom (dalam satuan karakter)
                $lebar_kolom_1 = 1;
                $lebar_kolom_2 = 12;
                $lebar_kolom_3 = 12;
                $lebar_kolom_4 = 12;

                // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n
                $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
                $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
                $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
                $kolom4 = wordwrap($kolom4, $lebar_kolom_4, "\n", true);

                // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
                $kolom1Array = explode("\n", $kolom1);
                $kolom2Array = explode("\n", $kolom2);
                $kolom3Array = explode("\n", $kolom3);
                $kolom4Array = explode("\n", $kolom4);

                // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
                $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array), count($kolom4Array));

                // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
                $hasilBaris = array();

                // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris
                for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

                    // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan,
                    $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                    $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");

                    // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                    $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_BOTH);
                    $hasilKolom4 = str_pad((isset($kolom4Array[$i]) ? $kolom4Array[$i] : ""), $lebar_kolom_4, " ", STR_PAD_RIGHT);

                    // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                    $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " " . $hasilKolom4;
                }

                // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
                return implode("\n", $hasilBaris) . "\n";
            }

            $printer->initialize();
            $printer->setFont(Printer::FONT_B);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->setTextSize(2, 2);
            $printer->text("Sodermee\n");
            $printer->initialize();
            $printer->setFont(Printer::FONT_B);
            $printer->setTextSize(1, 1);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("Kode Penjualan    : ". $penjualan->kode ."\n");
            $printer->text("Tanggal dan Waktu : ". $penjualan->created_at ."\n");
            $printer->text("Admin             : ". $penjualan->pegawai_nama ."\n");
            if(empty($penjualan->mitra_id)){
                $printer->text("Nama Pelanggan    : ". $penjualan->pelanggan_nama ."\n");
            }else{
                $printer->text("Nama Mitra        : ". $penjualan->pelanggan_nama ."\n");
            }
            $printer->text("------------------------------------------\n");
            $printer->text("BARANG : \n");
            // $printer->initialize();
            // $printer->setJustification(Printer::JUSTIFY_CENTER);
            $i = 1;
            foreach ($barangPenjualan as $row) {
                $tipe = $this->barangRepository->find($row->barang_id);
                if($tipe->tipe == 'Reguler'){
                    $barang = $this->barangRepository->getStokHarga($row->barang_id)->first();
                    $jumlahBarang = $row->jumlah;
                    $hargaBarang = $barang->harga;
                    $printer->text($i.". ". strtoupper($tipe->nama) ."\n");
                    $printer->text(buatBaris4Kolom(" ","Rp.". number_format($row->harga), $row->jumlah."x", "Rp.". number_format($row->subtotal)));
                }else if($tipe->tipe == 'Paket'){
                    $paket = $this->promoRepository->getPromoByBarangId($row->barang_id);
                    $barangPaket = $this->barangPromoRepository->getBarangPromoByPromoId($paket->id);
                    $jumlahBarang = $row->jumlah;
                    $hargaBarang = $this->barangRepository->getHarga($row->barang_id)->harga;
                    $printer->text($i.". ". $tipe->nama ."\n");
                    $printer->text(buatBaris4Kolom(" ","Rp.". number_format($row->harga), $row->jumlah."x", "Rp.". number_format($row->subtotal)));
                    foreach($barangPaket as $rowPaket){
                        $hargaBarangPaket = $this->barangRepository->getHarga($rowPaket->barang_id)->harga;
                        $stokBarangPaket = $this->barangRepository->getStok($rowPaket->barang_id)->stok;
                        $printer->text("-- ". $rowPaket->nama ."\n");
                        $printer->text("-- ". $rowPaket->jumlah  ."x\n");
                    }
                }
                $i++;
            }
            $printer->text("------------------------------------------\n");
            $printer->initialize();
            $printer -> setFont(Printer::FONT_B);
            $printer -> setTextSize(1, 1);
            $printer->setJustification(Printer::JUSTIFY_LEFT);
            $printer->text("DISKON      : - Rp.".number_format($diskonRupiah)."\n");
            $printer->text("              - ".$diskonPersen."%\n");
            $printer->text("ONGKIR      : Rp.". number_format($penjualan->ongkir)."\n");
            $printer->text("PPN         : ". $penjualan->ppn."%\n");
            $printer->text("TOTAL SEMUA : Rp.". number_format($penjualan->total)."\n");
            $printer->text("BAYAR       : Rp.". number_format($penjualan->bayar)."\n");
            $printer->text("------------------------------------------\n");
            $printer->initialize();
            $printer -> setFont(Printer::FONT_B);
            $printer -> setTextSize(1, 1);
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->bitImage($logo);
            $printer->text("Sodermee\n");
            $printer->feed(3);
            $printer->cut();
            $printer->close();
        } catch(Exception $e) {
            echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
        }
    }

    public function printPopUp($id){
        $barangPenjualan = $this->barangPenjualanRepository->allQuery(['penjualan_id' => $id])->get();

        $data['penjualan'] = $this->penjualanRepository->getWithWhere(['penjualan.id' => $id])->first();

        $diskonRupiah = 0;
        $diskonPersen = 0;

        if($data['penjualan']->voucher_id != null){
            if($data['penjualan']->tipe_voucher == 'rupiah'){
                $diskonRupiah += $data['penjualan']->diskon_voucher;
            }else if($data['penjualan']->tipe_voucher == 'persen'){
                $diskonPersen += $data['penjualan']->diskon_voucher;
            }
        }

        if(!empty($data['penjualan']->diskon_mitra)){
            $diskonPersen += $data['penjualan']->diskon_mitra;
        }

        $data['penjualan']->diskonRupiah = $diskonRupiah;
        $data['penjualan']->diskonPersen = $diskonPersen;

        $data['barangPenjualanReguler'] = BarangPenjualan::join('barang', 'barang.id', '=', 'barang_penjualan.barang_id')
                                          ->join('harga', 'harga.barang_id', '=', 'barang.id')
                                          ->join('stok', 'stok.barang_id', '=', 'barang.id')
                                          ->select('barang_penjualan.*', 'harga.harga', 'stok.stok', 'barang.nama')
                                          ->where('barang_penjualan.penjualan_id', $id)
                                          ->where('barang.tipe', "Reguler")
                                          ->get();

        $data['barangPenjualanPaket'] = BarangPenjualan::join('barang', 'barang.id', '=', 'barang_penjualan.barang_id')
                                          ->join('harga', 'harga.barang_id', '=', 'barang.id')
                                          ->join('stok', 'stok.barang_id', '=', 'barang.id')
                                          ->join('promo', 'promo.barang_id', '=', 'barang.id')
                                          ->select('barang_penjualan.*', 'harga.harga', 'stok.stok', 'barang.nama', 'promo.id as promo_id')
                                          ->where('barang_penjualan.penjualan_id', $id)
                                          ->where('barang.tipe', "Paket")
                                          ->get();
        foreach ($data['barangPenjualanPaket'] as $index => $row) {
            $barangPaket = $this->barangPromoRepository->getBarangPromoByPromoId($row->promo_id);
            $data['barangPenjualanPaket'][$index]->data_paket = $barangPaket;
        }

        // echo json_encode($data);
        return view('penjualan.struk', $data);
    }

    public function batalTransaksi(Request $request)
    {
        $id = $request->input('id');
        $keterangan = $request->input('k');

        $updatePenjualan = $this->penjualanRepository->update(['status' => 'Dibatalkan', 'keterangan' => $keterangan ], $id);
        Flash::success('Penjualan saved successfully.');

        return redirect(route('pembayaran'));
    }

    public function transaksiDibatalkan()
    {
        $data['data'] = $this->penjualanRepository->getWithWhere(['penjualan.status' => 'Dibatalkan'])->get();
        return view('penjualan.dibatalkan', $data);
    }
}
