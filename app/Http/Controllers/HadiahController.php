<?php

namespace App\Http\Controllers;

use App\DataTables\HadiahDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateHadiahRequest;
use App\Http\Requests\UpdateHadiahRequest;
use App\Repositories\HistoryKlaimHadiahRepository;
use App\Repositories\HadiahRepository;
use App\Repositories\PoinRepository;
use App\Repositories\LogPoinRepository;
use Illuminate\Http\Request;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Hadiah;

class HadiahController extends AppBaseController
{
    /** @var  HadiahRepository */
    private $hadiahRepository;
    private $poinRepository;

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
     *
     * @param HadiahDataTable $hadiahDataTable
     * @return Response
     */
    public function index(HadiahDataTable $hadiahDataTable)
    {
        return $hadiahDataTable->render('hadiah.index');
    }

    /**
     * Show the form for creating a new Hadiah.
     *
     * @return Response
     */
    public function create()
    {
        return view('hadiah.create');
    }

    /**
     * Store a newly created Hadiah in storage.
     *
     * @param CreateHadiahRequest $request
     *
     * @return Response
     */
    public function store(CreateHadiahRequest $request)
    {
        $input = $request->all();

        $hadiah = $this->hadiahRepository->create($input);

        Flash::success('Hadiah saved successfully.');

        return redirect(route('hadiah.index'));
    }

    /**
     * Display the specified Hadiah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hadiah = $this->hadiahRepository->getHadiah($id);

        if (empty($hadiah)) {
            Flash::error('Hadiah not found');

            return redirect(route('hadiah.index'));
        }

        return view('hadiah.show')->with('hadiah', $hadiah);
    }

    /**
     * Show the form for editing the specified Hadiah.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hadiah = $this->hadiahRepository->find($id);

        if (empty($hadiah)) {
            Flash::error('Hadiah not found');

            return redirect(route('hadiah.index'));
        }

        return view('hadiah.edit')->with('hadiah', $hadiah);
    }

    /**
     * Update the specified Hadiah in storage.
     *
     * @param  int              $id
     * @param UpdateHadiahRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHadiahRequest $request)
    {
        $hadiah = $this->hadiahRepository->find($id);

        if (empty($hadiah)) {
            Flash::error('Hadiah not found');

            return redirect(route('hadiah.index'));
        }

        $hadiah = $this->hadiahRepository->update($request->all(), $id);

        Flash::success('Hadiah updated successfully.');

        return redirect(route('hadiah.index'));
    }

    /**
     * Remove the specified Hadiah from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $hadiah = $this->hadiahRepository->find($id);

        if (empty($hadiah)) {
            Flash::error('Hadiah not found');

            return redirect(route('hadiah.index'));
        }

        $this->hadiahRepository->delete($id);

        Flash::success('Hadiah deleted successfully.');

        return redirect(route('hadiah.index'));
    }

    public function klaimHadiah(){
        $data['hadiah'] = $this->hadiahRepository->get();
        $data['poin'] = $this->poinRepository->getPoinByMitrId(Auth::id());
        return view("hadiah.klaim", $data);
    }

    public function klaimReward(Request $request){
        $input = $request->all();
        $input['keterangan'] = "Diajukan";
        $input['status'] = "Diajukan";
        $historyKlaimHadiah = $this->historyKlaimHadiahRepository->create($input);

        $poin = $this->poinRepository->allQuery(['mitra_id' => $input['mitra_id'] ])->first();
        $hadiah = $this->hadiahRepository->find($input['hadiah_id']);

        $dataPoin = [
            'poin' =>  $poin->poin - $hadiah->poin
        ];

        $dataHadiah = [
            'stok' =>  $hadiah->stok - 1
        ];

        $poinUpdate = $this->poinRepository->update($dataPoin, $poin->id);
        $hadiahUpdate = $this->hadiahRepository->update($dataHadiah, $hadiah->id);

        $this->logPoinRepository->create(
            [
                'mitra_id' => $input['mitra_id'],
                'keterangan' => "Pengajuan Klaim Hadiah",
                'jumlah' => $hadiah->poin
            ]
        );

        Flash::success('Berhasil, Mohon tunggu klaim hadiah sedang di ajukan');
        return redirect('/klaimHadiah');
    }
}
