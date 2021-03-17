<?php

namespace App\Http\Controllers;

use App\DataTables\PegawaiDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;
use App\Repositories\UserRepository;
use App\Repositories\PegawaiRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PegawaiController extends AppBaseController
{
    /** @var  PegawaiRepository */
    private $pegawaiRepository;

    public function __construct(PegawaiRepository $pegawaiRepo, UserRepository $userRepo)
    {
        $this->pegawaiRepository = $pegawaiRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Pegawai.
     *
     * @param PegawaiDataTable $pegawaiDataTable
     * @return Response
     */
    public function index(PegawaiDataTable $pegawaiDataTable)
    {
        return $pegawaiDataTable->render('pegawai.index');
    }

    /**
     * Show the form for creating a new Pegawai.
     *
     * @return Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created Pegawai in storage.
     *
     * @param CreatePegawaiRequest $request
     *
     * @return Response
     */
    public function store(CreatePegawaiRequest $request)
    {
        $user = $this->userRepository->store($request->all());
        $user->syncRoles($request['role_id']);

        $request->request->add(['user_id' => $user->id]);

        $input = $request->all();

        $lastRecord = $this->pegawaiRepository->allQuery()->orderBy('created_at', 'desc')->first();
        if(empty($lastRecord)){
            $input['kode'] = 'PEG-'.date('ym').'-'.'0000';
        }else{
            $kodeOld = explode('-', $lastRecord->kode);
            if(count($kodeOld) == 3){
                if($kodeOld[1] == date('ym')){
                    $noUrut = intval($kodeOld[2]) + 1;
                    $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                    $input['kode'] = 'PEG-'.date('ym').'-'.$no;
                }else{
                    $input['kode'] = 'PEG-'.date('ym').'-'.'0000';
                }
            }else{
                $input['kode'] = 'PEG-'.date('ym').'-'.'0000';
            }
        }

        $pegawai = $this->pegawaiRepository->create($input);

        Flash::success('Pegawai saved successfully.');

        return redirect(route('pegawai.index'));
    }

    /**
     * Display the specified Pegawai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pegawai = $this->pegawaiRepository->getPegawai($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');

            return redirect(route('pegawai.index'));
        }

        return view('pegawai.show')->with('pegawai', $pegawai);
    }

    /**
     * Show the form for editing the specified Pegawai.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pegawai = $this->pegawaiRepository->find($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');

            return redirect(route('pegawai.index'));
        }

        return view('pegawai.edit')->with('pegawai', $pegawai);
    }

    /**
     * Update the specified Pegawai in storage.
     *
     * @param  int              $id
     * @param UpdatePegawaiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePegawaiRequest $request)
    {
        $pegawai = $this->pegawaiRepository->find($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');

            return redirect(route('pegawai.index'));
        }

        $pegawai = $this->pegawaiRepository->update($request->all(), $id);

        Flash::success('Pegawai updated successfully.');

        return redirect(route('pegawai.index'));
    }

    /**
     * Remove the specified Pegawai from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pegawai = $this->pegawaiRepository->find($id);

        if (empty($pegawai)) {
            Flash::error('Pegawai not found');

            return redirect(route('pegawai.index'));
        }

        $this->pegawaiRepository->delete($id);

        Flash::success('Pegawai deleted successfully.');

        return redirect(route('pegawai.index'));
    }
}
