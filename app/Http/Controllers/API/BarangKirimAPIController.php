<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangKirimAPIRequest;
use App\Http\Requests\API\UpdateBarangKirimAPIRequest;
use App\Models\BarangKirim;
use App\Models\BarangTerima;
use App\Models\TerimaBarang;
use App\Models\DetailPurchaseOrder;
use App\Models\PurchaseOrder;
use App\Repositories\BarangKirimRepository;
use App\Repositories\KirimBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BarangKirimController
 * @package App\Http\Controllers\API
 */

class BarangKirimAPIController extends AppBaseController
{
    /** @var  BarangKirimRepository */
    private $barangKirimRepository;

    private $kirimBarangRepository;

    public function __construct(BarangKirimRepository $barangKirimRepo, KirimBarangRepository $kirimBarangRepo)
    {
        $this->barangKirimRepository = $barangKirimRepo;

        $this->kirimBarangRepository = $kirimBarangRepo;
    }

    /**
     * Display a listing of the BarangKirim.
     * GET|HEAD /barangKirim
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $barangKirim = $this->barangKirimRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($barangKirim->toArray(), 'Barang Kirim retrieved successfully');
    }

    /**
     * Store a newly created BarangKirim in storage.
     * POST /barangKirim
     *
     * @param CreateBarangKirimAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangKirimAPIRequest $request)
    {
        $input = $request->all();        
        $barangKirim = $this->barangKirimRepository->create($input);        

        $barangpo =  DetailPurchaseOrder::join('kirim_barang', 'kirim_barang.purchase_order_id', '=', 'detail_purchase_order.purchase_order_id')
                                        ->select('detail_purchase_order.*')
                                        ->where('kirim_barang.id', '=', $input['kirim_barang_id'])
                                        ->where('detail_purchase_order.barang_id', '=', $input['barang_id'])
                                        ->first();

        DetailPurchaseOrder::where('id', $barangpo->id)->where('barang_id', $barangpo->barang_id)->update(array('status' => 'close'));
        
        return $this->sendResponse($barangKirim->toArray(), 'Barang Kirim saved successfully');            
    }

    /**
     * Display the specified BarangKirim.
     * GET|HEAD /barangKirim/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BarangKirim $barangKirim */
        $barangKirim = $this->barangKirimRepository->find($id);

        if (empty($barangKirim)) {
            return $this->sendError('Barang Kirim not found');
        }

        return $this->sendResponse($barangKirim->toArray(), 'Barang Kirim retrieved successfully');
    }

    /**
     * Update the specified BarangKirim in storage.
     * PUT/PATCH /barangKirim/{id}
     *
     * @param int $id
     * @param UpdateBarangKirimAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangKirimAPIRequest $request)
    {
        $input = $request->all();

        /** @var BarangKirim $barangKirim */
        $barangKirim = $this->barangKirimRepository->find($id);

        if (empty($barangKirim)) {
            return $this->sendError('Barang Kirim not found');
        }

        $barangKirim = $this->barangKirimRepository->update($input, $id);

        return $this->sendResponse($barangKirim->toArray(), 'BarangKirim updated successfully');
    }

    /**
     * Remove the specified BarangKirim from storage.
     * DELETE /barangKirim/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BarangKirim $barangKirim */
        $barangKirim = $this->barangKirimRepository->find($id);

        if (empty($barangKirim)) {
            return $this->sendError('Barang Kirim not found');
        }

        $barangKirim->delete();

        return $this->sendSuccess('Barang Kirim deleted successfully');
    }

    public function getBarangKirim($id){

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
                                        ->select('barang.nama', 'barang_kirim.*', "harga.harga")
                                        ->where('barang_kirim.kirim_barang_id', '=', $id)
                                        ->where('barang_kirim.barang_id', '=', $b->barang_id)
                                        ->where('harga.deleted_at', '=', null)
                                        ->first();
            if(!empty($bhasil)){
                $b->checked = true;
                $b->jumlah_kurang = $bhasil->jumlah;
                array_push($array, $b);
            }
        }                                                                                
        
        $data['barangKirim'] = $array;       

        return $data;   
    }

    public function  getBarangKirimByid($id){
        $bhasil  = BarangKirim::join('barang', "barang.id", "=", "barang_kirim.barang_id")
                            ->join("harga", "harga.barang_id", "=", "barang.id")                                        
                            ->select('barang.nama', 'barang_kirim.*', "harga.harga")
                            ->where('barang_kirim.kirim_barang_id', '=', $id)
                            ->where('harga.deleted_at', '=', null)
                            ->get();
        return $bhasil;
    }

    public function deleteBarangKirim($id){
        BarangKirim::where('kirim_barang_id', $id)->forceDelete();
        
        return $this->sendSuccess('Barang Kirim deleted successfully');
    }

    public function checkBarangBK($id){
        $terimaBarang = TerimaBarang::find($id);
        $bk = BarangKirim::where("kirim_barang_id", $terimaBarang->kirim_barang_id)
                                   ->get();
        foreach ($bk as $b) {
           $idb = $b->barang_id;
           $bt = BarangTerima::where('terima_barang_id', $id)->where('barang_id', $idb)->get()->count();
           if($bt == 1){
                BarangKirim::where('kirim_barang_id', $b->kirim_barang_id)->where('barang_id', $idb)->update(array('status' => 'close'));
           }else{
                BarangKirim::where('kirim_barang_id', $b->kirim_barang_id)->where('barang_id', $idb)->update(array('status' => 'open'));
           }
        }

        return $this->sendSuccess('successfully');
    }
}
