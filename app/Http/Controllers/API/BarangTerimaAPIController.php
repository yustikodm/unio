<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBarangTerimaAPIRequest;
use App\Http\Requests\API\UpdateBarangTerimaAPIRequest;
use App\Models\BarangTerima;
use App\Models\BarangKirim;
use App\Repositories\BarangTerimaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BarangTerimaController
 * @package App\Http\Controllers\API
 */

class BarangTerimaAPIController extends AppBaseController
{
    /** @var  BarangTerimaRepository */
    private $barangTerimaRepository;

    public function __construct(BarangTerimaRepository $barangTerimaRepo)
    {
        $this->barangTerimaRepository = $barangTerimaRepo;
    }

    /**
     * Display a listing of the BarangTerima.
     * GET|HEAD /barangTerima
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $barangTerima = $this->barangTerimaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($barangTerima->toArray(), 'Barang Terima retrieved successfully');
    }

    /**
     * Store a newly created BarangTerima in storage.
     * POST /barangTerima
     *
     * @param CreateBarangTerimaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBarangTerimaAPIRequest $request)
    {
        $input = $request->all();

        $barangTerima = $this->barangTerimaRepository->create($input);

        $barangkirim =  BarangKirim::join('terima_barang', 'terima_barang.kirim_barang_id', '=', 'barang_kirim.kirim_barang_id')
                                    ->select('barang_kirim.*')
                                    ->where('terima_barang.id', '=', $input['terima_barang_id'])
                                    ->where('barang_kirim.barang_id', '=', $input['barang_id'])
                                    ->first();
        // echo json_encode($barangkirim);
        BarangKirim::where('id', $barangkirim->id)->where('barang_id', $barangkirim->barang_id)->update(array('status' => 'close'));
        
        return $this->sendResponse($barangTerima->toArray(), 'Barang Terima saved successfully');
	        
    }

    /**
     * Display the specified BarangTerima.
     * GET|HEAD /barangTerima/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var BarangTerima $barangTerima */
        $barangTerima = $this->barangTerimaRepository->find($id);

        if (empty($barangTerima)) {
            return $this->sendError('Barang Terima not found');
        }

        return $this->sendResponse($barangTerima->toArray(), 'Barang Terima retrieved successfully');
    }

    /**
     * Update the specified BarangTerima in storage.
     * PUT/PATCH /barangTerima/{id}
     *
     * @param int $id
     * @param UpdateBarangTerimaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBarangTerimaAPIRequest $request)
    {
        $input = $request->all();

        /** @var BarangTerima $barangTerima */
        $barangTerima = $this->barangTerimaRepository->find($id);

        if (empty($barangTerima)) {
            return $this->sendError('Barang Terima not found');
        }

        $barangTerima = $this->barangTerimaRepository->update($input, $id);

        return $this->sendResponse($barangTerima->toArray(), 'BarangTerima updated successfully');
    }

    /**
     * Remove the specified BarangTerima from storage.
     * DELETE /barangTerima/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var BarangTerima $barangTerima */
        $barangTerima = $this->barangTerimaRepository->find($id);

        if (empty($barangTerima)) {
            return $this->sendError('Barang Terima not found');
        }

        $barangTerima->delete();

        return $this->sendSuccess('Barang Terima deleted successfully');
    }

    public function getBarangTerima($id){
        $data['barangTerima'] = BarangTerima::join('harga', 'harga.barang_id', '=', 'barang_terima.barang_id')
                                            ->select("barang_terima.*", "harga.harga")
                                            ->where('terima_barang_id', $id)
                                            ->get();

        return $data;   
    }

    public function deleteBarangTerima($id){
        BarangTerima::where('terima_barang_id', $id)->forceDelete();
        
        return $this->sendSuccess('Barang Terima deleted successfully');
    }
}
