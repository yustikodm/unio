<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateHistoryKlaimHadiahAPIRequest;
use App\Http\Requests\API\UpdateHistoryKlaimHadiahAPIRequest;
use App\Models\HistoryKlaimHadiah;
use App\Repositories\HistoryKlaimHadiahRepository;
use App\Repositories\PoinRepository;
use App\Repositories\HadiahRepository;
use App\Repositories\LogPoinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class HistoryKlaimHadiahController
 * @package App\Http\Controllers\API
 */

class HistoryKlaimHadiahAPIController extends AppBaseController
{
    /** @var  HistoryKlaimHadiahRepository */
    private $historyKlaimHadiahRepository;
    private $hadiahRepository;
    private $poinRepository;
    private $logPoinRepository;

    public function __construct(
            HistoryKlaimHadiahRepository $historyKlaimHadiahRepo, 
            PoinRepository $poinRepo, 
            HadiahRepository $hadiahRepo,
            LogPoinRepository $logPoinRepo
        )
    {
        $this->historyKlaimHadiahRepository = $historyKlaimHadiahRepo;
        $this->poinRepository = $poinRepo;
        $this->logPoinRepository = $logPoinRepo;
        $this->hadiahRepository = $hadiahRepo;
    }

    /**
     * Display a listing of the HistoryKlaimHadiah.
     * GET|HEAD /historyKlaimHadiah
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($historyKlaimHadiah->toArray(), 'History Klaim Hadiah retrieved successfully');
    }

    /**
     * Store a newly created HistoryKlaimHadiah in storage.
     * POST /historyKlaimHadiah
     *
     * @param CreateHistoryKlaimHadiahAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateHistoryKlaimHadiahAPIRequest $request)
    {
        $input = $request->all();

        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->create($input);

        return $this->sendResponse($historyKlaimHadiah->toArray(), 'History Klaim Hadiah saved successfully');
    }

    /**
     * Display the specified HistoryKlaimHadiah.
     * GET|HEAD /historyKlaimHadiah/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var HistoryKlaimHadiah $historyKlaimHadiah */
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->find($id);

        if (empty($historyKlaimHadiah)) {
            return $this->sendError('History Klaim Hadiah not found');
        }

        return $this->sendResponse($historyKlaimHadiah->toArray(), 'History Klaim Hadiah retrieved successfully');
    }

    /**
     * Update the specified HistoryKlaimHadiah in storage.
     * PUT/PATCH /historyKlaimHadiah/{id}
     *
     * @param int $id
     * @param UpdateHistoryKlaimHadiahAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHistoryKlaimHadiahAPIRequest $request)
    {
        $input = $request->all();

        /** @var HistoryKlaimHadiah $historyKlaimHadiah */
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->find($id);

        if (empty($historyKlaimHadiah)) {
            return $this->sendError('History Klaim Hadiah not found');
        }

        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->update($input, $id);

        return $this->sendResponse($historyKlaimHadiah->toArray(), 'HistoryKlaimHadiah updated successfully');
    }

    /**
     * Remove the specified HistoryKlaimHadiah from storage.
     * DELETE /historyKlaimHadiah/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var HistoryKlaimHadiah $historyKlaimHadiah */
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->find($id);

        if (empty($historyKlaimHadiah)) {
            return $this->sendError('History Klaim Hadiah not found');
        }

        $historyKlaimHadiah->delete();

        return $this->sendSuccess('History Klaim Hadiah deleted successfully');
    }

    public function agreeReward($id){
        $this->historyKlaimHadiahRepository->update(array('keterangan' => 'Selamat Klaim Hadiah Anda Disetujui', 'status' => 'Disetujui'),$id);
        return $this->sendSuccess('Berhasil'); 
        // $history = $this->historyKlaimHadiahRepository->find($id);
        // $hadiah = $this->hadiahRepository->find($history->hadiah_id);    
        // if($hadiah->stok == 0){
        //     return $this->sendError('Maaf Stok Hadiah Kosong');
        // }        
        // if($hadiah->poin == 0){
        //     return $this->sendError('Maaf Poin Hadiah Kosong');
        // }        
        // $poin = $this->poinRepository->all(
        //     ['mitra_id' => $history->mitra_id]
        // );
        // if($poin[0]->poin >= $hadiah->poin){ 
        //     $poinMitra = $poin[0]->poin - $hadiah->poin; 
        //     $this->poinRepository->update(array('poin' => $poinMitra),$poin[0]->id); 
        //     $stokHadiah = $hadiah->stok - 1;
        //     $this->hadiahRepository->update(array('stok' => $stokHadiah), $history->hadiah_id);            
            // $this->logPoinRepository->create([
            //     'mitra_id' => $history->mitra_id, 
            //     'keterangan' => 'pengurangan untuk pengambilan hadiah', 
            //     'jumlah' => $hadiah->poin 
            // ]); 
        // }else{ 
        //     return $this->sendError('Maaf poin mitra tidak mencukupi');    
        // }                 
    } 
}
