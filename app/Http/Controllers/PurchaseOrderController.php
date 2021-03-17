<?php

namespace App\Http\Controllers;

use App\DataTables\PurchaseOrderDataTable;
use App\Models\DetailPurchaseOrder;
use App\Models\PurchaseOrder;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Requests\CreatePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Repositories\PurchaseOrderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Repositories\PegawaiRepository;
use Response;

class PurchaseOrderController extends AppBaseController
{
    /** @var  PurchaseOrderRepository */
    private $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepo, PegawaiRepository $pegawai)
    {
        $this->pegawaiRepository = $pegawai;
        $this->purchaseOrderRepository = $purchaseOrderRepo;
    }

    /**
     * Display a listing of the PurchaseOrder.
     *
     * @param PurchaseOrderDataTable $purchaseOrderDataTable
     * @return Response
     */
    public function index(PurchaseOrderDataTable $purchaseOrderDataTable)
    {
        return $purchaseOrderDataTable->render('purchase_order.index');
    }

    /**
     * Show the form for creating a new PurchaseOrder.
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

        return view('purchase_order.create', $data);
    }

    /**
     * Store a newly created PurchaseOrder in storage.
     *
     * @param CreatePurchaseOrderRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseOrderRequest $request)
    {
        $input = $request->all();

        $purchaseOrder = $this->purchaseOrderRepository->create($input);

        Flash::success('Purchase Order saved successfully.');

        return redirect(route('purchaseOrder.index'));
    }

    /**
     * Display the specified PurchaseOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $data['purchaseOrder'] = PurchaseOrder::join('supplier', "supplier.id", "=", "purchase_order.supplier_id")
                                        ->join('pegawai', "pegawai.id", "=", "purchase_order.pegawai_id")
                                        ->select('supplier.nama AS nama_supplier','pegawai.nama as  pegawai', 'purchase_order.*')
                                        ->where('purchase_order.id', '=', $id)
                                        ->first();
        $data['detailPurchaseOrder'] = DetailPurchaseOrder::join('barang', "barang.id", "=", "detail_purchase_order.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")
                                        ->select('barang.nama', 'detail_purchase_order.*', "harga.harga")
                                        ->where('detail_purchase_order.purchase_order_id', '=', $id)
                                        // ->where('detail_purchase_order.status', '=', 'open')
                                        ->where('harga.deleted_at', '=', null)
                                        ->get();
        if (empty($data['purchaseOrder'])) {
            Flash::error('Purchase Order not found');

            return redirect(route('purchaseOrder.index'));
        }

        return view('purchase_order.show', $data); //->with('purchaseOrder', $purchaseOrder);
    }

    /**
     * Show the form for editing the specified PurchaseOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $data['purchaseOrder'] = $this->purchaseOrderRepository->find($id);
        $data['detailPurchaseOrder'] = DetailPurchaseOrder::join('barang', "barang.id", "=", "detail_purchase_order.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")
                                        ->join("stok", "stok.barang_id", "=", "barang.id")
                                        ->select('barang.nama', 'detail_purchase_order.*', "harga.harga", "stok.stok")
                                        ->where('detail_purchase_order.purchase_order_id', '=', $id)
                                        ->where('harga.deleted_at', '=', null)
                                        ->where('stok.deleted_at', '=', null)
                                        ->get();

        $data['PegawaiUser'] = '';
        if(auth()->user()->hasRole('admin')){

        }else{
            $userLoginid = auth()->user()->id;
            $pegawai = $this->pegawaiRepository->getUserByUserId($userLoginid);
            if(!empty($pegawai)){
                $data['PegawaiUser'] = $pegawai;
            }
        }

        if (empty($data['purchaseOrder'])) {
            Flash::error('Purchase Order not found');

            return redirect(route('purchaseOrder.index'));
        }

        return view('purchase_order.edit', $data);
    }

    /**
     * Update the specified PurchaseOrder in storage.
     *
     * @param  int              $id
     * @param UpdatePurchaseOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseOrderRequest $request)
    {
        $purchaseOrder = $this->purchaseOrderRepository->find($id);

        if (empty($purchaseOrder)) {
            Flash::error('Purchase Order not found');

            return redirect(route('purchaseOrder.index'));
        }

        $purchaseOrder = $this->purchaseOrderRepository->update($request->all(), $id);

        Flash::success('Purchase Order updated successfully.');

        return redirect(route('purchaseOrder.index'));
    }

    /**
     * Remove the specified PurchaseOrder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchaseOrder = $this->purchaseOrderRepository->find($id);

        if (empty($purchaseOrder)) {
            Flash::error('Purchase Order not found');

            return redirect(route('purchaseOrder.index'));
        }

        DetailPurchaseOrder::where('purchase_order_id', $id)->delete();

        $this->purchaseOrderRepository->delete($id);

        Flash::success('Purchase Order deleted successfully.');

        return redirect(route('purchaseOrder.index'));
    }

    public function updatePurchaseOrder($id){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');
        $lastRecord = PurchaseOrder::where('id', '!=', $id)->where('kode', '!=', null)->orderBy('tanggal_diproses', 'desc')->first();
        if(empty($lastRecord)){
            $kode = 'PO-'.date('ym').'-'.'0000';
            PurchaseOrder::where('id', $id)->update(array('kode' => $kode, 'tanggal_diproses' => $date, 'status' => 'Diprosess'));
        }else{
            $kodeOld = explode('-', $lastRecord->kode);
            if($kodeOld[1] == date('ym')){
                $noUrut = intval($kodeOld[2]) + 1;
                $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                $kode = 'PO-'.date('ym').'-'.$no;
            }else{
                $kode = 'PO-'.date('ym').'-'.'0000';
            }
            PurchaseOrder::where('id', $id)->update(array('kode' => $kode, 'tanggal_diproses' => $date, 'status' => 'Diprosess'));
        }

        Flash::success('Purchase Order Berhasil Di diprosess.');
        return redirect(route('purchaseOrder.index'));
    }
}
