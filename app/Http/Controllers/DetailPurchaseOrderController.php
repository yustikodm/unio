<?php

namespace App\Http\Controllers;

use App\DataTables\DetailPurchaseOrderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDetailPurchaseOrderRequest;
use App\Http\Requests\UpdateDetailPurchaseOrderRequest;
use App\Repositories\DetailPurchaseOrderRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class DetailPurchaseOrderController extends AppBaseController
{
    /** @var  DetailPurchaseOrderRepository */
    private $detailPurchaseOrderRepository;

    public function __construct(DetailPurchaseOrderRepository $detailPurchaseOrderRepo)
    {
        $this->detailPurchaseOrderRepository = $detailPurchaseOrderRepo;
    }

    /**
     * Display a listing of the DetailPurchaseOrder.
     *
     * @param DetailPurchaseOrderDataTable $detailPurchaseOrderDataTable
     * @return Response
     */
    public function index(DetailPurchaseOrderDataTable $detailPurchaseOrderDataTable)
    {
        return $detailPurchaseOrderDataTable->render('detail_purchase_oder.index');
    }

    /**
     * Show the form for creating a new DetailPurchaseOrder.
     *
     * @return Response
     */
    public function create()
    {
        return view('detail_purchase_oder.create');
    }

    /**
     * Store a newly created DetailPurchaseOrder in storage.
     *
     * @param CreateDetailPurchaseOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateDetailPurchaseOrderRequest $request)
    {
        $input = $request->all();

        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->create($input);

        Flash::success('Detail Purchase Order saved successfully.');

        return redirect(route('detailPurchaseOder.index'));
    }

    /**
     * Display the specified DetailPurchaseOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->find($id);

        if (empty($detailPurchaseOrder)) {
            Flash::error('Detail Purchase Order not found');

            return redirect(route('detailPurchaseOder.index'));
        }

        return view('detail_purchase_oder.show')->with('detailPurchaseOrder', $detailPurchaseOrder);
    }

    /**
     * Show the form for editing the specified DetailPurchaseOrder.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->find($id);

        if (empty($detailPurchaseOrder)) {
            Flash::error('Detail Purchase Order not found');

            return redirect(route('detailPurchaseOder.index'));
        }

        return view('detail_purchase_oder.edit')->with('detailPurchaseOrder', $detailPurchaseOrder);
    }

    /**
     * Update the specified DetailPurchaseOrder in storage.
     *
     * @param  int              $id
     * @param UpdateDetailPurchaseOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetailPurchaseOrderRequest $request)
    {
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->find($id);

        if (empty($detailPurchaseOrder)) {
            Flash::error('Detail Purchase Order not found');

            return redirect(route('detailPurchaseOder.index'));
        }

        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->update($request->all(), $id);

        Flash::success('Detail Purchase Order updated successfully.');

        return redirect(route('detailPurchaseOder.index'));
    }

    /**
     * Remove the specified DetailPurchaseOrder from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detailPurchaseOrder = $this->detailPurchaseOrderRepository->find($id);

        if (empty($detailPurchaseOrder)) {
            Flash::error('Detail Purchase Order not found');

            return redirect(route('detailPurchaseOder.index'));
        }

        $this->detailPurchaseOrderRepository->delete($id);

        Flash::success('Detail Purchase Order deleted successfully.');

        return redirect(route('detailPurchaseOder.index'));
    }

    public function updateDPO(Request $request){
        var_dump($request);        
    }
}
