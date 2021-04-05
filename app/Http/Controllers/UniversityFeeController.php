<?php

namespace App\Http\Controllers;

use App\DataTables\UniversityFeeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUniversityFeeRequest;
use App\Http\Requests\UpdateUniversityFeeRequest;
use App\Repositories\UniversityFeeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UniversityFeeController extends AppBaseController
{
    /** @var  UniversityFeeRepository */
    private $universityFeeRepository;

    public function __construct(UniversityFeeRepository $universityFeeRepo)
    {
        $this->universityFeeRepository = $universityFeeRepo;
    }

    /**
     * Display a listing of the UniversityFee.
     *
     * @param UniversityFeeDataTable $universityFeeDataTable
     * @return Response
     */
    public function index(UniversityFeeDataTable $universityFeeDataTable)
    {
        return $universityFeeDataTable->render('university_fees.index');
    }

    /**
     * Show the form for creating a new UniversityFee.
     *
     * @return Response
     */
    public function create()
    {
        return view('university_fees.create');
    }

    /**
     * Store a newly created UniversityFee in storage.
     *
     * @param CreateUniversityFeeRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityFeeRequest $request)
    {
        $input = $request->all();

        $universityFee = $this->universityFeeRepository->create($input);

        Flash::success('University Fee saved successfully.');

        return redirect(route('university-fees.index'));
    }

    /**
     * Display the specified UniversityFee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $universityFee = $this->universityFeeRepository->find($id);

        if (empty($universityFee)) {
            Flash::error('University Fee not found');

            return redirect(route('university-fees.index'));
        }

        return view('university_fees.show')->with('universityFee', $universityFee);
    }

    /**
     * Show the form for editing the specified UniversityFee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $universityFee = $this->universityFeeRepository->find($id);

        if (empty($universityFee)) {
            Flash::error('University Fee not found');

            return redirect(route('university-fees.index'));
        }

        return view('university_fees.edit')->with('universityFee', $universityFee);
    }

    /**
     * Update the specified UniversityFee in storage.
     *
     * @param  int              $id
     * @param UpdateUniversityFeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityFeeRequest $request)
    {
        $universityFee = $this->universityFeeRepository->find($id);

        if (empty($universityFee)) {
            Flash::error('University Fee not found');

            return redirect(route('university-fees.index'));
        }

        $universityFee = $this->universityFeeRepository->update($request->all(), $id);

        Flash::success('University Fee updated successfully.');

        return redirect(route('university-fees.index'));
    }

    /**
     * Remove the specified UniversityFee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $universityFee = $this->universityFeeRepository->find($id);

        if (empty($universityFee)) {
            Flash::error('University Fee not found');

            return redirect(route('university-fees.index'));
        }

        $this->universityFeeRepository->delete($id);

        Flash::success('University Fee deleted successfully.');

        return redirect(route('university-fees.index'));
    }
}
