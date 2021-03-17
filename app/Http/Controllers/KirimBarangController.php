<?php

namespace App\Http\Controllers;

use App\DataTables\KirimBarangDataTable;
use App\Models\BarangKirim;
use App\Models\DetailPurchaseOrder;
use App\Models\KirimBarang;
use App\Models\PurchaseOrder;
use App\Http\Requests;
use App\Http\Requests\CreateKirimBarangRequest;
use App\Http\Requests\UpdateKirimBarangRequest;
use App\Repositories\KirimBarangRepository;
use App\Repositories\PegawaiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class KirimBarangController extends AppBaseController
{
    /** @var  KirimBarangRepository */
    private $kirimBarangRepository;

    public function __construct(KirimBarangRepository $kirimBarangRepo, PegawaiRepository $pegawai)
    {
        $this->pegawaiRepository = $pegawai;
        $this->kirimBarangRepository = $kirimBarangRepo;
    }

    /**
     * Display a listing of the KirimBarang.
     *
     * @param KirimBarangDataTable $kirimBarangDataTable
     * @return Response
     */
    public function index(KirimBarangDataTable $kirimBarangDataTable)
    {
        return $kirimBarangDataTable->render('kirim_barang.index');
    }

    /**
     * Show the form for creating a new KirimBarang.
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

        return view('kirim_barang.create', $data);
    }

    /**
     * Store a newly created KirimBarang in storage.
     *
     * @param CreateKirimBarangRequest $request
     *
     * @return Response
     */
    public function store(CreateKirimBarangRequest $request)
    {
        $input = $request->all();

        $kirimBarang = $this->kirimBarangRepository->create($input);

        Flash::success('Kirim Barang saved successfully.');

        return redirect(route('kirimBarang.index'));
    }

    /**
     * Display the specified KirimBarang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $data['kirimBarang'] = KirimBarang::join('purchase_order', 'kirim_barang.purchase_order_id', '=', 'purchase_order.id')
                                            ->join('supplier', 'kirim_barang.supplier_id', '=', 'supplier.id')
                                            ->join('pegawai', 'kirim_barang.pegawai_id', '=', 'pegawai.id')
                                            ->select('purchase_order.kode AS kode_po','pegawai.nama as pegawai', 'supplier.nama AS nama_supplier', 'kirim_barang.*')
                                            ->where('kirim_barang.id', '=', $id)
                                            ->first();
        $data['barangKirim'] = BarangKirim::join('barang', "barang.id", "=", "barang_kirim.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")
                                        ->select('barang.nama', 'barang_kirim.*', "harga.harga")
                                        ->where('barang_kirim.kirim_barang_id', '=', $id)
                                        ->where('harga.deleted_at', '=', null)
                                        ->get();

        $idpo = $data['kirimBarang']->purchase_order_id;
        $data['barangPurchaseOrder'] = DetailPurchaseOrder::join('barang', "barang.id", "=", "detail_purchase_order.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")
                                        ->select('barang.nama', 'detail_purchase_order.*', "harga.harga")
                                        ->where('detail_purchase_order.purchase_order_id', '=', $idpo)
                                        ->where('harga.deleted_at', '=', null)
                                        ->get();

        if (empty($data['kirimBarang'])) {
            Flash::error('Kirim Barang not found');

            return redirect(route('kirimBarang.index'));
        }

        return view('kirim_barang.show', $data);
    }

    /**
     * Show the form for editing the specified KirimBarang.
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
        $data['kirimBarang'] = $this->kirimBarangRepository->find($id);
        $idpo = $data['kirimBarang']->purchase_order_id;
        $idkb = $data['kirimBarang']->id;
        $barang = DetailPurchaseOrder::join('barang', "barang.id", "=", "detail_purchase_order.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")
                                        ->join("kirim_barang", "kirim_barang.purchase_order_id", "=", "detail_purchase_order.purchase_order_id")
                                        ->select('barang.nama', 'detail_purchase_order.*', "harga.harga")
                                        ->where('detail_purchase_order.jumlah_kurang', '!=', 0)
                                        ->where('kirim_barang.id', '=', $id)
                                        ->where('harga.deleted_at', '=', null)
                                        ->get();
        $array = [];

        foreach ($barang as $b){
            $bhasil  = BarangKirim::join('barang', "barang.id", "=", "barang_kirim.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")
                                        // ->join("kirim_barang", "kirim_barang.barang_id", "=", "barang.id")
                                        ->select('barang.nama', 'barang_kirim.*', "harga.harga")
                                        ->where('barang_kirim.kirim_barang_id', '=', $id)
                                        ->where('barang_kirim.barang_id', '=', $b->barang_id)
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
        // echo json_encode($barang);

        if (empty($data['kirimBarang'])) {
            Flash::error('Kirim Barang not found');

            return redirect(route('kirimBarang.index'));
        }

        return view('kirim_barang.edit', $data);
    }

    /**
     * Update the specified KirimBarang in storage.
     *
     * @param  int              $id
     * @param UpdateKirimBarangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKirimBarangRequest $request)
    {
        $kirimBarang = $this->kirimBarangRepository->find($id);

        if (empty($kirimBarang)) {
            Flash::error('Kirim Barang not found');

            return redirect(route('kirimBarang.index'));
        }

        $kirimBarang = $this->kirimBarangRepository->update($request->all(), $id);

        Flash::success('Kirim Barang updated successfully.');

        return redirect(route('kirimBarang.index'));
    }

    /**
     * Remove the specified KirimBarang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kirimBarang = $this->kirimBarangRepository->find($id);

        if (empty($kirimBarang)) {
            Flash::error('Kirim Barang not found');

            return redirect(route('kirimBarang.index'));
        }

        BarangKirim::where('kirim_barang_id', $id)->delete();

        DetailPurchaseOrder::where('purchase_order_id', $kirimBarang->purchase_order_id)->where('status', 'close')->where('jumlah_kurang', '!=', '0')->update(array('status' => 'open'));

        $this->kirimBarangRepository->delete($id);

        Flash::success('Kirim Barang deleted successfully.');

        return redirect(route('kirimBarang.index'));
    }

    public function updateKirimBarang($id){
        date_default_timezone_set('Asia/Jakarta');
        try{
            $kirimBarang = $this->kirimBarangRepository->find($id);

            $barangdpo = DetailPurchaseOrder::join('barang', "barang.id", "=", "detail_purchase_order.barang_id")
                                            ->join("harga", "harga.barang_id", "=", "barang.id")
                                            ->join("kirim_barang", "kirim_barang.purchase_order_id", "=", "detail_purchase_order.purchase_order_id")
                                            ->select('barang.nama', 'detail_purchase_order.*', "harga.harga")
                                            ->where('kirim_barang.id', '=', $id)
                                            ->where('detail_purchase_order.jumlah_kurang', '!=', '0')
                                            ->where('harga.deleted_at', '=', null)
                                            ->get();

            $iddpo = $kirimBarang->purchase_order_id;

            $barangbk  = BarangKirim::join('barang', "barang.id", "=", "barang_kirim.barang_id")
                                    ->join("harga", "harga.barang_id", "=", "barang.id")
                                    ->join("kirim_barang", "kirim_barang.id", "=", "barang_kirim.kirim_barang_id")
                                    ->select('barang.nama', 'barang_kirim.*', "harga.harga")
                                    ->where('barang_kirim.kirim_barang_id', '=', $id)
                                    ->where('harga.deleted_at', '=', null)
                                    ->get();

            foreach ($barangdpo as $dpo) {
                foreach ($barangbk as $bk) {
                    if($dpo->barang_id == $bk->barang_id){
                        $jumlah =  $dpo->jumlah_kurang - $bk->jumlah_kurang;
                        if($jumlah == 0){
                            DetailPurchaseOrder::where('id', $dpo->id)->where('barang_id', $dpo->barang_id)->update(array('jumlah_kurang' => $jumlah, 'status' => 'Close'));
                        }else{
                            DetailPurchaseOrder::where('id', $dpo->id)->where('barang_id', $dpo->barang_id)->update(array('jumlah_kurang' => $jumlah, 'status' => 'Open'));
                        }
                    }
                }
            }

            if(count($barangdpo) == count($barangbk)){
                $poid = $kirimBarang->purchase_order_id;
                $dpo = DetailPurchaseOrder::where('purchase_order_id', '=', $poid)->where('jumlah_kurang', '!=', '0')->get();
                // echo count($dpo);
                if(count($dpo) == 0){
                    $data = ['status' => 'Close'];
                    PurchaseOrder::where('id', $poid)->update($data);
                }

            }

            $tanggalKirim = date('Y-m-d H:i:s');

            $lastRecord = KirimBarang::where('id', '!=', $id)->where('kode', '!=', null)->orderBy('tanggal_kirim', 'desc')->first();
            if(empty($lastRecord)){
                $kode = 'KB-'.date('ym').'-'.'0000';
                KirimBarang::where('id', $id)->update(array('kode' => $kode,'status' => 'Dikirim', 'tanggal_kirim' => $tanggalKirim));
            }else{
                $kodeOld = explode('-', $lastRecord->kode);
                if($kodeOld[1] == date('ym')){
                    $noUrut = intval($kodeOld[2]) + 1;
                    $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                    $kode = 'KB-'.date('ym').'-'.$no;
                }else{
                    $kode = 'KB-'.date('ym').'-'.'0000';
                }
                KirimBarang::where('id', $id)->update(array('kode' => $kode,'status' => 'Dikirim', 'tanggal_kirim' => $tanggalKirim));
            }

            Flash::success('Kirim Barang berhasil Dikirim.');
            return redirect(route('kirimBarang.index'));
        }catch (Exception $e){
            Flash::error($e);
            return redirect(route('kirimBarang.index'));
        }
    }

}
