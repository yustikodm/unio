<?php

namespace App\Http\Controllers;

use App\DataTables\ReferralDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateReferralRequest;
use App\Http\Requests\UpdateReferralRequest;
use App\Repositories\ReferralRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ReferralController extends AppBaseController
{
    /** @var  ReferralRepository */
    private $referralRepository;

    public function __construct(ReferralRepository $referralRepo)
    {
        $this->referralRepository = $referralRepo;
    }

    /**
     * Display a listing of the Referral.
     *
     * @param ReferralDataTable $referralDataTable
     * @return Response
     */
    public function index(ReferralDataTable $referralDataTable)
    {
        return $referralDataTable->render('referral.index');
    }

    /**
     * Show the form for creating a new Referral.
     *
     * @return Response
     */
    public function create()
    {
        return view('referral.create');
    }

    /**
     * Store a newly created Referral in storage.
     *
     * @param CreateReferralRequest $request
     *
     * @return Response
     */
    public function store(CreateReferralRequest $request)
    {
        $input = $request->all();

        $referral = $this->referralRepository->create($input);

        Flash::success('Referral saved successfully.');

        return redirect(route('referral.index'));
    }

    /**
     * Display the specified Referral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $referral = $this->referralRepository->find($id);

        if (empty($referral)) {
            Flash::error('Referral not found');

            return redirect(route('referral.index'));
        }

        return view('referral.show')->with('referral', $referral);
    }

    /**
     * Show the form for editing the specified Referral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $referral = $this->referralRepository->find($id);

        if (empty($referral)) {
            Flash::error('Referral not found');

            return redirect(route('referral.index'));
        }

        return view('referral.edit')->with('referral', $referral);
    }

    /**
     * Update the specified Referral in storage.
     *
     * @param  int              $id
     * @param UpdateReferralRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReferralRequest $request)
    {
        $referral = $this->referralRepository->find($id);

        if (empty($referral)) {
            Flash::error('Referral not found');

            return redirect(route('referral.index'));
        }

        $referral = $this->referralRepository->update($request->all(), $id);

        Flash::success('Referral updated successfully.');

        return redirect(route('referral.index'));
    }

    /**
     * Remove the specified Referral from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $referral = $this->referralRepository->find($id);

        if (empty($referral)) {
            Flash::error('Referral not found');

            return redirect(route('referral.index'));
        }

        $this->referralRepository->delete($id);

        Flash::success('Referral deleted successfully.');

        return redirect(route('referral.index'));
    }
}
