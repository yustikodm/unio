<?php

namespace App\Http\Controllers;

use App\DataTables\BonusDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateBonusRequest;
use App\Http\Requests\UpdateBonusRequest;
use App\Repositories\BonusRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Response;

class BonusController extends AppBaseController
{
    /** @var  BonusRepository */
    private $bonusRepository;

    public function __construct(BonusRepository $bonusRepo)
    {
        $this->bonusRepository = $bonusRepo;
    }

    /**
     * Display a listing of the Bonus.
     *
     * @param BonusDataTable $bonusDataTable
     * @return Response
     */
    public function index(BonusDataTable $bonusDataTable)
    {
        return $bonusDataTable->render('bonus.index');
    }

    /**
     * Show the form for creating a new Bonus.
     *
     * @return Response
     */
    public function create()
    {
        return view('bonus.create');
    }

    /**
     * Store a newly created Bonus in storage.
     *
     * @param CreateBonusRequest $request
     *
     * @return Response
     */
    public function store(CreateBonusRequest $request)
    {
        $input = $request->all();

        $bonus = $this->bonusRepository->create($input);

        Flash::success('Bonus saved successfully.');

        return redirect(route('bonus.index'));
    }

    /**
     * Display the specified Bonus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bonus = $this->bonusRepository->find($id);

        if (empty($bonus)) {
            Flash::error('Bonus not found');

            return redirect(route('bonus.index'));
        }

        return view('bonus.show')->with('bonus', $bonus);
    }

    /**
     * Show the form for editing the specified Bonus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bonus = $this->bonusRepository->find($id);

        if (empty($bonus)) {
            Flash::error('Bonus not found');

            return redirect(route('bonus.index'));
        }

        return view('bonus.edit')->with('bonus', $bonus);
    }

    /**
     * Update the specified Bonus in storage.
     *
     * @param  int              $id
     * @param UpdateBonusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBonusRequest $request)
    {
        $bonus = $this->bonusRepository->find($id);

        if (empty($bonus)) {
            Flash::error('Bonus not found');

            return redirect(route('bonus.index'));
        }

        $bonus = $this->bonusRepository->update($request->all(), $id);

        Flash::success('Bonus updated successfully.');

        return redirect(route('bonus.index'));
    }

    /**
     * Remove the specified Bonus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bonus = $this->bonusRepository->find($id);

        if (empty($bonus)) {
            Flash::error('Bonus not found');

            return redirect(route('bonus.index'));
        }

        $this->bonusRepository->delete($id);

        Flash::success('Bonus deleted successfully.');

        return redirect(route('bonus.index'));
    }

    public function klaimBonus(){        
        $data['bonus'] = $this->bonusRepository->getBonusByMitrId(Auth::id());
        return view('bonus.klaim', $data);
    }
}
