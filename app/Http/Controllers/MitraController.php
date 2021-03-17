<?php

namespace App\Http\Controllers;

use App\DataTables\MitraDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMitraRequest;
use App\Http\Requests\UpdateMitraRequest;
use App\Http\Requests\CreateUserRequest;
use App\Repositories\MitraRepository;
use App\Repositories\ReferralRepository;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Repositories\PenjualanRepository;
use App\Repositories\PelangganRepository;
use App\Repositories\BonusRepository;
use App\Repositories\BintangRepository;
use App\Repositories\PoinRepository;
use App\Repositories\LevelMitraRepository;
use Illuminate\Support\Facades\Auth;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MitraController extends AppBaseController
{
    /** @var  MitraRepository */
    private $mitraRepository;
    private $userRepository;

    public function __construct(
        MitraRepository $mitraRepo,
        UserRepository $userRepo,
        RoleRepository $roleRepo,
        ReferralRepository $referral,
        PenjualanRepository $penjualan,
        PelangganRepository $pelanggan,
        BonusRepository $bonus,
        BintangRepository $bintang,
        PoinRepository $poin,
        LevelMitraRepository $level
    )
    {
        $this->mitraRepository = $mitraRepo;
        $this->userRepository = $userRepo;
        $this->roleRepository = $roleRepo;
        $this->referralRepository = $referral;
        $this->penjualanRepository = $penjualan;
        $this->pelangganRepository = $pelanggan;
        $this->poinRepository = $poin;
        $this->bintangRepository = $bintang;
        $this->bonusRepository = $bonus;
        $this->levelRepository = $level;
    }

    /**
     * Display a listing of the Mitra.
     *
     * @param MitraDataTable $mitraDataTable
     * @return Response
     */
    public function index(MitraDataTable $mitraDataTable)
    {
        return $mitraDataTable->render('mitra.index');
    }

    /**
     * Show the form for creating a new Mitra.
     *
     * @return Response
     */
    public function create()
    {
        return view('mitra.create');
    }

    /**
     * Store a newly created Mitra in storage.
     *
     * @param CreateMitraRequest $request
     *
     * @return Response
     */
    public function store(CreateMitraRequest $request)
    {
        // create user and mitra
        try {
            $roles = $this->roleRepository->allQuery(['name' => 'mitra'])->first();
            $user = $this->userRepository->store($request->all());

            if (!empty($roles)) {
                $user->syncRoles($roles->name);
            }

            $request->request->add(['user_id' => $user->id]);

            $input = $request->all();

            $lastRecord = $this->mitraRepository->allQuery()->orderBy('created_at', 'desc')->first();
            if(empty($lastRecord)){
                $input['kode'] = 'MTR-'.date('ym').'-'.'0000';
            }else{
                $kodeOld = explode('-', $lastRecord->kode);
                if(count($kodeOld) == 3){
                    if($kodeOld[1] == date('ym')){
                        $noUrut = intval($kodeOld[2]) + 1;
                        $no = str_pad($noUrut,4,"0",STR_PAD_LEFT);
                        $input['kode'] = 'MTR-'.date('ym').'-'.$no;
                    }else{
                        $input['kode'] = 'MTR-'.date('ym').'-'.'0000';
                    }
                }else{
                    $input['kode'] = 'MTR-'.date('ym').'-'.'0000';
                }
            }

            $mitra = $this->mitraRepository->create($input);
            if(!empty($input['referral_id'])){
                $referral = [
                    'parent_id' => $input['referral_id'],
                    'child_id' => $mitra->id
                ];
                $this->referralRepository->create($referral);
            }
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }

        Flash::success('Mitra saved successfully.');

        return redirect(route('mitra.index'));
    }

    /**
     * Display the specified Mitra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mitra = $this->mitraRepository->getMitra($id);

        if (empty($mitra)) {
            Flash::error('Mitra not found');

            return redirect(route('mitra.index'));
        }

        return view('mitra.show')->with('mitra', $mitra);
    }

    /**
     * Show the form for editing the specified Mitra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mitra = $this->mitraRepository->getMitra($id);
        $user = $this->userRepository->find($mitra->user_id);
        $pelanggan = $this->pelangganRepository->find($mitra->pelanggan_id);

        if (empty($mitra)) {
            Flash::error('Mitra not found');

            return redirect(route('mitra.index'));
        }

        if (empty($user)) {
            Flash::error('Mitra user account not found');

            return redirect(route('mitra.index'));
        }

        return view('mitra.edit')->with('mitra', $mitra)->with('user', $user);
    }

    /**
     * Update the specified Mitra in storage.
     *
     * @param  int              $id
     * @param UpdateMitraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMitraRequest $request)
    {
        $mitra = $this->mitraRepository->find($id);
        $user = $this->userRepository->find($mitra->user_id);

        if (empty($mitra)) {
            Flash::error('Mitra not found');

            return redirect(route('mitra.index'));
        }

        if (empty($user)) {
            Flash::error('Mitra user account not found');

            return redirect(route('mitra.index'));
        }

        try {
            $mitra = $this->mitraRepository->update($request->all(), $id);
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }


        Flash::success('Mitra updated successfully.');

        return redirect(route('mitra.index'));
    }

    /**
     * Remove the specified Mitra from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mitra = $this->mitraRepository->find($id);
        $user = $this->userRepository->find($mitra->user_id);

        if (empty($mitra)) {
            Flash::error('Mitra not found');

            return redirect(route('mitra.index'));
        }

        $this->mitraRepository->delete($id);

        if (!empty($user)) {
            $this->userRepository->delete($user->id);
        }

        Flash::success('Mitra deleted successfully.');

        return redirect(route('mitra.index'));
    }

    public function mitraProfile(){
        $idMitra = Auth::user()->id;
        $data['mitra'] = $this->mitraRepository->allQuery(['user_id' => $idMitra])->first();
        $data['user'] = $this->userRepository->find($data['mitra']->user_id);
        $data['pelanggan'] = $this->pelangganRepository->getPelanggan($data['mitra']->pelanggan_id);
        $data['penjualan'] = $this->penjualanRepository->getPenjualanMitra($data['mitra']->id);
        $data['referral'] = $this->referralRepository->allQuery(['parent_id' => $data['mitra']->id])->get();
        $data['bintang'] = $this->bintangRepository->allQuery(['mitra_id' => $data['mitra']->id])->first();
        $data['bonus'] = $this->bonusRepository->allQuery(['mitra_id' => $data['mitra']->id])->first();
        $data['poin'] = $this->poinRepository->allQuery(['mitra_id' => $data['mitra']->id])->first();
        $data['level'] = $this->levelRepository->find($data['mitra']->level_mitra_id);

        return view('mitra.profile', $data);
    }
}
