<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDetailPurchaseOrderAPIRequest;
use App\Http\Requests\API\UpdateDetailPurchaseOrderAPIRequest;
use App\Models\DetailPurchaseOrder;
use App\Models\KirimBarang;
use App\Models\BarangKirim;
use App\Repositories\DetailPurchaseOrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DetailPurchaseOrderController
 * @package App\Http\Controllers\API
 */

class DetailPurchaseOrderAPIController extends AppBaseController
{
    /** @var  DetailPurchaseOrderRepository */
    private $detailPurchaseOrderRepository;

    public function __construct(DetailPurchaseOrderRepository $detailPurchaseOrderRepo)
    {
        $this->detailPurchaseOrderRepository = $detailPurchaseOrderRepo;
    }

    /**
     * Display a listing of the DetailPurchaseOrder.
     * GET|HEAD /detailPurchaseOder
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $detailPurchaseOder = $this->detailPurchaseOrderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($detailPurchaseOder->toArray(), 'Detail Purchase Oder retrieved successfully');
    }

    /**
     * Store a newly created DetailPurchaseOrder in storage.
     * POST /detailPurchaseOder
     *
     * @param CreateDetailPurchaseOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPurchaseOrderAPIRequest $request)
    {
        $input = $request->all();

        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->create($input);

        return $this->sendResponse($detailPurchaseOrder->toArray(), 'Detail Purchase Order saved successfully');
    }

    /**
     * Display the specified DetailPurchaseOrder.
     * GET|HEAD /detailPurchaseOder/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DetailPurchaseOrder $detailPurchaseOrder */
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->find($id);

        if (empty($detailPurchaseOrder)) {
            return $this->sendError('Detail Purchase Order not found');
        }

        return $this->sendResponse($detailPurchaseOrder->toArray(), 'Detail Purchase Order retrieved successfully');
    }

    /**
     * Update the specified DetailPurchaseOrder in storage.
     * PUT/PATCH /detailPurchaseOder/{id}
     *
     * @param int $id
     * @param UpdateDetailPurchaseOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPurchaseOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var DetailPurchaseOrder $detailPurchaseOrder */
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->find($id);

        if (empty($detailPurchaseOrder)) {
            return $this->sendError('Detail Purchase Order not found');
        }

        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->update($input, $id);

        return $this->sendResponse($detailPurchaseOrder->toArray(), 'DetailPurchaseOrder updated successfully');
    }

    /**
     * Remove the specified DetailPurchaseOrder from storage.
     * DELETE /detailPurchaseOder/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroyByPoId($id)
    {
        $detailPurchaseOrder = DetailPurchaseOrder::where('purchase_order_id', $id)->forceDelete();

        // if (empty($detailPurchaseOrder)) {
        //     return $this->sendError('Detail Purchase Order not found');
        // }
                
        return $this->sendSuccess('Detail Purchase Order deleted successfully');
    }

    public function destroy($id)
    {
        
        /** @var DetailPurchaseOrder $detailPurchaseOrder */
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->find($id);

        if (empty($detailPurchaseOrder)) {
            return $this->sendError('Detail Purchase Order not found');
        }

        $detailPurchaseOrder->delete();

        return $this->sendSuccess('Detail Purchase Order deleted successfully');
    }

    public function getDetailPurchaseOrder($id){
        $data['data'] = DetailPurchaseOrder::join("harga", "harga.barang_id", "=", "detail_purchase_order.barang_id")
                                           ->select("detail_purchase_order.*", "harga.harga")
                                           ->where("detail_purchase_order.purchase_order_id", $id)
                                           ->where("detail_purchase_order.jumlah_kurang", '!=' ,'0')
                                           ->get();
        return $data;
    }

    public function checkBarangDPO($id){
        $KirimBarang = KirimBarang::find($id);
        $dpo = DetailPurchaseOrder::where("purchase_order_id", $KirimBarang->purchase_order_id)->get();

        foreach ($dpo as $b) {
           $idb = $b->barang_id;
           $iddpo = $b->purchase_order_id;
           $bk = BarangKirim::where('kirim_barang_id', $id)->where('barang_id', $idb)->get()->count();
           if($bk == 1){
                DetailPurchaseOrder::where('purchase_order_id', $iddpo)->where('barang_id', $idb)->update(array('status' => 'close'));
           }else{
                DetailPurchaseOrder::where('purchase_order_id', $iddpo)->where('barang_id', $idb)->update(array('status' => 'open'));
           }
        }
        return $this->sendSuccess('successfully');        
    }
}

