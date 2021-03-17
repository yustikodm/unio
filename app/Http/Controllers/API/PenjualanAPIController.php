<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePenjualanAPIRequest;
use App\Http\Requests\API\UpdatePenjualanAPIRequest;
use App\Models\Penjualan;
use App\Repositories\PenjualanRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PenjualanController
 * @package App\Http\Controllers\API
 */

class PenjualanAPIController extends AppBaseController
{
    /** @var  PenjualanRepository */
    private $penjualanRepository;

    public function __construct(PenjualanRepository $penjualanRepo)
    {
        $this->penjualanRepository = $penjualanRepo;
    }

    /**
     * Display a listing of the Penjualan.
     * GET|HEAD /penjualan
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $penjualan = $this->penjualanRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($penjualan->toArray(), 'Penjualan retrieved successfully');
    }

    /**
     * Store a newly created Penjualan in storage.
     * POST /penjualan
     *
     * @param CreatePenjualanAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePenjualanAPIRequest $request)
    {
        $input = $request->all();

        $penjualan = $this->penjualanRepository->create($input);

        return $this->sendResponse($penjualan->toArray(), 'Penjualan saved successfully');
    }

    /**
     * Display the specified Penjualan.
     * GET|HEAD /penjualan/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Penjualan $penjualan */
        $penjualan = $this->penjualanRepository->find($id);

        if (empty($penjualan)) {
            return $this->sendError('Penjualan not found');
        }

        return $this->sendResponse($penjualan->toArray(), 'Penjualan retrieved successfully');
    }

    /**
     * Update the specified Penjualan in storage.
     * PUT/PATCH /penjualan/{id}
     *
     * @param int $id
     * @param UpdatePenjualanAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenjualanAPIRequest $request)
    {
        $input = $request->all();

        /** @var Penjualan $penjualan */
        $penjualan = $this->penjualanRepository->find($id);

        if (empty($penjualan)) {
            return $this->sendError('Penjualan not found');
        }

        $penjualan = $this->penjualanRepository->update($input, $id);

        return $this->sendResponse($penjualan->toArray(), 'Penjualan updated successfully');
    }

    /**
     * Remove the specified Penjualan from storage.
     * DELETE /penjualan/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Penjualan $penjualan */
        $penjualan = $this->penjualanRepository->find($id);

        if (empty($penjualan)) {
            return $this->sendError('Penjualan not found');
        }

        $penjualan->delete();

        return $this->sendSuccess('Penjualan deleted successfully');
    }

    public function getDataDashboard()
    {
        $data['penjualan'] = [];        
        $dataPenjualan = $this->penjualanRepository->getForDashboard();
        foreach ($dataPenjualan as $row) {
            $month_num = $row->bulan;
            $namaBulan = date("F", mktime(0, 0, 0, $month_num, 10));
            $arr = ['bulan' => $namaBulan, 'total' => $row->total];            
            array_push($data['penjualan'], json_decode(json_encode($arr)));
        }        
        return json_encode($data);
    }
}
