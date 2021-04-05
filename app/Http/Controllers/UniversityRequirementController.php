<?php

namespace App\Http\Controllers;

use App\DataTables\UniversityRequirementDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUniversityRequirementRequest;
use App\Http\Requests\UpdateUniversityRequirementRequest;
use App\Repositories\UniversityRequirementRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UniversityRequirementController extends AppBaseController
{
    /** @var  UniversityRequirementRepository */
    private $universityRequirementRepository;

    public function __construct(UniversityRequirementRepository $universityRequirementRepo)
    {
        $this->universityRequirementRepository = $universityRequirementRepo;
    }

    /**
     * Display a listing of the UniversityRequirement.
     *
     * @param UniversityRequirementDataTable $universityRequirementDataTable
     * @return Response
     */
    public function index(UniversityRequirementDataTable $universityRequirementDataTable)
    {
        return $universityRequirementDataTable->render('university_requirements.index');
    }

    /**
     * Show the form for creating a new UniversityRequirement.
     *
     * @return Response
     */
    public function create()
    {
        return view('university_requirements.create');
    }

    /**
     * Store a newly created UniversityRequirement in storage.
     *
     * @param CreateUniversityRequirementRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityRequirementRequest $request)
    {
        $input = $request->all();

        $universityRequirement = $this->universityRequirementRepository->create($input);

        Flash::success('University Requirement saved successfully.');

        return redirect(route('university-requirements.index'));
    }

    /**
     * Display the specified UniversityRequirement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $universityRequirement = $this->universityRequirementRepository->find($id);

        if (empty($universityRequirement)) {
            Flash::error('University Requirement not found');

            return redirect(route('university-requirements.index'));
        }

        return view('university_requirements.show')->with('universityRequirement', $universityRequirement);
    }

    /**
     * Show the form for editing the specified UniversityRequirement.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $universityRequirement = $this->universityRequirementRepository->find($id);

        if (empty($universityRequirement)) {
            Flash::error('University Requirement not found');

            return redirect(route('university-requirements.index'));
        }

        return view('university_requirements.edit')->with('universityRequirement', $universityRequirement);
    }

    /**
     * Update the specified UniversityRequirement in storage.
     *
     * @param  int              $id
     * @param UpdateUniversityRequirementRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityRequirementRequest $request)
    {
        $universityRequirement = $this->universityRequirementRepository->find($id);

        if (empty($universityRequirement)) {
            Flash::error('University Requirement not found');

            return redirect(route('university-requirements.index'));
        }

        $universityRequirement = $this->universityRequirementRepository->update($request->all(), $id);

        Flash::success('University Requirement updated successfully.');

        return redirect(route('university-requirements.index'));
    }

    /**
     * Remove the specified UniversityRequirement from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $universityRequirement = $this->universityRequirementRepository->find($id);

        if (empty($universityRequirement)) {
            Flash::error('University Requirement not found');

            return redirect(route('university-requirements.index'));
        }

        $this->universityRequirementRepository->delete($id);

        Flash::success('University Requirement deleted successfully.');

        return redirect(route('university-requirements.index'));
    }
}
