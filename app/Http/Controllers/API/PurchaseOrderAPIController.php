<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePurchaseOrderAPIRequest;
use App\Http\Requests\API\UpdatePurchaseOrderAPIRequest;
use App\Models\PurchaseOrder;
use App\Models\DetailPurchaseOrder;
use App\Repositories\PurchaseOrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PurchaseOrderController
 * @package App\Http\Controllers\API
 */

class PurchaseOrderAPIController extends AppBaseController
{
    /** @var  PurchaseOrderRepository */
    private $purchaseOrderRepository;

    public function __construct(PurchaseOrderRepository $purchaseOrderRepo)
    {
        $this->purchaseOrderRepository = $purchaseOrderRepo;
    }

    /**
     * Display a listing of the PurchaseOrder.
     * GET|HEAD /purchaseOrder
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $purchaseOrder = $this->purchaseOrderRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($purchaseOrder->toArray(), 'Purchase Order retrieved successfully');
    }

    /**
     * Store a newly created PurchaseOrder in storage.
     * POST /purchaseOrder
     *
     * @param CreatePurchaseOrderAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePurchaseOrderAPIRequest $request)
    {
        $input = $request->all();

        $purchaseOrder = $this->purchaseOrderRepository->create($input);

        return $this->sendResponse($purchaseOrder->toArray(), 'Purchase Order saved successfully');
    }

    /**
     * Display the specified PurchaseOrder.
     * GET|HEAD /purchaseOrder/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
            $data['purchaseOrder'] = $this->purchaseOrderRepository->find($id);

            $data['detailPurchaseOrder'] = DetailPurchaseOrder::join('barang', "barang.id", "=", "detail_purchase_order.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")                      
                                        ->select('barang.nama', 'detail_purchase_order.*', "harga.harga")
                                        ->where('detail_purchase_order.purchase_order_id', '=', $id)
                                        ->where('detail_purchase_order.status', '=', 'open')
                                        ->where('detail_purchase_order.jumlah_kurang', '!=', '0')
                                        ->where('harga.deleted_at', '=', null)
                                        ->get();
        if (empty($data['purchaseOrder'])) {

            return $this->sendError('Purchase Order not found');
        }

        return $this->sendResponse($data, 'Purchase Order retrieved successfully');
    }

    /**
     * Update the specified PurchaseOrder in storage.
     * PUT/PATCH /purchaseOrder/{id}
     *
     * @param int $id
     * @param UpdatePurchaseOrderAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurchaseOrderAPIRequest $request)
    {
        $input = $request->all();

        /** @var PurchaseOrder $purchaseOrder */
        $purchaseOrder = $this->purchaseOrderRepository->find($id);

        if (empty($purchaseOrder)) {
            return $this->sendError('Purchase Order not found');
        }

        $purchaseOrder = $this->purchaseOrderRepository->update($input, $id);

        return $this->sendResponse($purchaseOrder->toArray(), 'PurchaseOrder updated successfully');
    }

    /**
     * Remove the specified PurchaseOrder from storage.
     * DELETE /purchaseOrder/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PurchaseOrder $purchaseOrder */
        $purchaseOrder = $this->purchaseOrderRepository->find($id);

        if (empty($purchaseOrder)) {
            return $this->sendError('Purchase Order not found');
        }

        $purchaseOrder->delete();

        return $this->sendSuccess('Purchase Order deleted successfully');
    }

    public function updatePurchaseOrder($id){
        PurchaseOrder::where('id', $id)->update(array('status' => 'close'));
        return $this->sendSuccess('Purchase Order deleted successfully');
    }
}
