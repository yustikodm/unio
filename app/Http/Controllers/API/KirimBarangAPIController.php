<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKirimBarangAPIRequest;
use App\Http\Requests\API\UpdateKirimBarangAPIRequest;
use App\Models\KirimBarang;
use App\Models\BarangKirim;
use App\Models\DetailPurchaseOrder;
use App\Repositories\KirimBarangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class KirimBarangController
 * @package App\Http\Controllers\API
 */

class KirimBarangAPIController extends AppBaseController
{
    /** @var  KirimBarangRepository */
    private $kirimBarangRepository;

    public function __construct(KirimBarangRepository $kirimBarangRepo)
    {
        $this->kirimBarangRepository = $kirimBarangRepo;
    }

    /**
     * Display a listing of the KirimBarang.
     * GET|HEAD /kirimBarang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kirimBarang = $this->kirimBarangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($kirimBarang->toArray(), 'Kirim Barang retrieved successfully');
    }

    /**
     * Store a newly created KirimBarang in storage.
     * POST /kirimBarang
     *
     * @param CreateKirimBarangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKirimBarangAPIRequest $request)
    {
        $input = $request->all();

        $kirimBarang = $this->kirimBarangRepository->create($input);

        return $this->sendResponse($kirimBarang->toArray(), 'Kirim Barang saved successfully');
    }

    /**
     * Display the specified KirimBarang.
     * GET|HEAD /kirimBarang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var KirimBarang $kirimBarang */
        $data['kirimBarang'] = $this->kirimBarangRepository->find($id);
        // $idpo = $data['kirimBarang']->purchase_order_id;
        $data['barangKirim'] = BarangKirim::join('barang', "barang.id", "=", "barang_kirim.barang_id")
                                        ->join("harga", "harga.barang_id", "=", "barang.id")                      
                                        ->select('barang.nama', 'barang_kirim.*', "harga.harga")
                                        ->where('barang_kirim.kirim_barang_id', '=', $id)
                                        ->where('barang_kirim.status', '=', 'open')
                                        ->where('barang_kirim.status', '!=', '0')
                                        ->where('harga.deleted_at', '=', null)
                                        ->get();

        if (empty($data['kirimBarang'])) {
            return $this->sendError('Kirim Barang not found');
        }

        return $this->sendResponse($data, 'Kirim Barang retrieved successfully');
    }

    /**
     * Update the specified KirimBarang in storage.
     * PUT/PATCH /kirimBarang/{id}
     *
     * @param int $id
     * @param UpdateKirimBarangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKirimBarangAPIRequest $request)
    {
        $input = $request->all();

        /** @var KirimBarang $kirimBarang */
        $kirimBarang = $this->kirimBarangRepository->find($id);

        if (empty($kirimBarang)) {
            return $this->sendError('Kirim Barang not found');
        }

        $kirimBarang = $this->kirimBarangRepository->update($input, $id);

        return $this->sendResponse($kirimBarang->toArray(), 'KirimBarang updated successfully');
    }

    /**
     * Remove the specified KirimBarang from storage.
     * DELETE /kirimBarang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var KirimBarang $kirimBarang */
        $kirimBarang = $this->kirimBarangRepository->find($id);

        if (empty($kirimBarang)) {
            return $this->sendError('Kirim Barang not found');
        }

        $kirimBarang->delete();

        return $this->sendSuccess('Kirim Barang deleted successfully');
    }

    
}
