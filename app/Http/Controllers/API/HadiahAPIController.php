<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHadiahAPIRequest;
use App\Http\Requests\API\UpdateHadiahAPIRequest;
use App\Models\Hadiah;
use App\Repositories\HadiahRepository;
use App\Repositories\HistoryKlaimHadiahRepository;
use App\Repositories\PoinRepository;
use App\Repositories\LogPoinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class HadiahController
 * @package App\Http\Controllers\API
 */

class HadiahAPIController extends AppBaseController
{
    /** @var  HadiahRepository */
    private $hadiahRepository;

    public function __construct(
        HadiahRepository $hadiahRepo, 
        PoinRepository $pointRepo, 
        HistoryKlaimHadiahRepository $historyKlaimHadiahRepo,
        LogPoinRepository $logPoin
    )
    {
        $this->historyKlaimHadiahRepository = $historyKlaimHadiahRepo;
        $this->hadiahRepository = $hadiahRepo;
        $this->poinRepository = $pointRepo;
        $this->logPoinRepository = $logPoin;
    }

    /**
     * Display a listing of the Hadiah.
     * GET|HEAD /hadiah
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $hadiah = $this->hadiahRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($hadiah->toArray(), 'Hadiah retrieved successfully');
    }

    /**
     * Store a newly created Hadiah in storage.
     * POST /hadiah
     *
     * @param CreateHadiahAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHadiahAPIRequest $request)
    {
        $input = $request->all();

        $hadiah = $this->hadiahRepository->create($input);

        return $this->sendResponse($hadiah->toArray(), 'Hadiah saved successfully');
    }

    /**
     * Display the specified Hadiah.
     * GET|HEAD /hadiah/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Hadiah $hadiah */
        $hadiah = $this->hadiahRepository->find($id);

        if (empty($hadiah)) {
            return $this->sendError('Hadiah not found');
        }

        return $this->sendResponse($hadiah->toArray(), 'Hadiah retrieved successfully');
    }

    /**
     * Update the specified Hadiah in storage.
     * PUT/PATCH /hadiah/{id}
     *
     * @param int $id
     * @param UpdateHadiahAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHadiahAPIRequest $request)
    {
        $input = $request->all();

        /** @var Hadiah $hadiah */
        $hadiah = $this->hadiahRepository->find($id);

        if (empty($hadiah)) {
            return $this->sendError('Hadiah not found');
        }

        $hadiah = $this->hadiahRepository->update($input, $id);

        return $this->sendResponse($hadiah->toArray(), 'Hadiah updated successfully');
    }

    /**
     * Remove the specified Hadiah from storage.
     * DELETE /hadiah/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Hadiah $hadiah */
        $hadiah = $this->hadiahRepository->find($id);

        if (empty($hadiah)) {
            return $this->sendError('Hadiah not found');
        }

        $hadiah->delete();

        return $this->sendSuccess('Hadiah deleted successfully');
    }

    public function diclineReward(Request $request, $idHistoryKlaim)
    {
        $input = $request->all();
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->update($input, $idHistoryKlaim);        

        $poin = $this->poinRepository->allQuery(['mitra_id' => $historyKlaimHadiah->mitra_id ])->first();
        $hadiah = $this->hadiahRepository->find($historyKlaimHadiah->hadiah_id);        

        $dataPoin = [
            'poin' =>  $poin->poin + $hadiah->poin
        ];
        
        $dataHadiah = [
            'stok' =>  $hadiah->stok + 1
        ];

        $poinUpdate = $this->poinRepository->update($dataPoin, $poin->id);
        
        $hadiahUpdate = $this->hadiahRepository->update($dataHadiah, $hadiah->id);

        $this->logPoinRepository->create(
            [
                'mitra_id' => $historyKlaimHadiah->mitra_id,
                'keterangan' => "Pengembalian Klaim Hadiah",
                'jumlah' => $hadiah->poin
            ]
        );

        return $this->sendSuccess('Berhasil menolak successfully');
    }

}
