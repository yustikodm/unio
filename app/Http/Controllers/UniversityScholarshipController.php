<?php

namespace App\Http\Controllers;

use App\DataTables\UniversityScholarshipDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUniversityScholarshipRequest;
use App\Http\Requests\UpdateUniversityScholarshipRequest;
use App\Repositories\UniversityScholarshipRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class UniversityScholarshipController extends AppBaseController
{
    /** @var  UniversityScholarshipRepository */
    private $universityScholarshipRepository;

    public function __construct(UniversityScholarshipRepository $universityScholarshipRepo)
    {
        $this->universityScholarshipRepository = $universityScholarshipRepo;
    }

    /**
     * Display a listing of the UniversityScholarship.
     *
     * @param UniversityScholarshipDataTable $universityScholarshipDataTable
     * @return Response
     */
    public function index(UniversityScholarshipDataTable $universityScholarshipDataTable)
    {
        return $universityScholarshipDataTable->render('university_scholarships.index');
    }

    /**
     * Show the form for creating a new UniversityScholarship.
     *
     * @return Response
     */
    public function create()
    {
        return view('university_scholarships.create');
    }

    /**
     * Store a newly created UniversityScholarship in storage.
     *
     * @param CreateUniversityScholarshipRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityScholarshipRequest $request)
    {
        $input = $request->only([
            'university_id',
            'name',
            'description',
            'picture',
            'year'
        ]);

        $universityScholarship = $this->universityScholarshipRepository->create($input);

        Flash::success('University Scholarship saved successfully.');

        return redirect(route('university-scholarships.index'));
    }

    /**
     * Display the specified UniversityScholarship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $universityScholarship = $this->universityScholarshipRepository->find($id);

        if (empty($universityScholarship)) {
            Flash::error('University Scholarship not found');

            return redirect(route('university-scholarships.index'));
        }

        return view('university_scholarships.show')->with('universityScholarship', $universityScholarship);
    }

    /**
     * Show the form for editing the specified UniversityScholarship.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $universityScholarship = $this->universityScholarshipRepository->find($id);

        if (empty($universityScholarship)) {
            Flash::error('University Scholarship not found');

            return redirect(route('university-scholarships.index'));
        }

        return view('university_scholarships.edit')->with('universityScholarship', $universityScholarship);
    }

    /**
     * Update the specified UniversityScholarship in storage.
     *
     * @param  int              $id
     * @param UpdateUniversityScholarshipRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityScholarshipRequest $request)
    {
        $universityScholarship = $this->universityScholarshipRepository->find($id);

        if (empty($universityScholarship)) {
            Flash::error('University Scholarship not found');

            return redirect(route('university-scholarships.index'));
        }

        $input = $request->only([
            'university_id',
            'name',
            'description',
            'picture',
            'year'
        ]);

        $universityScholarship = $this->universityScholarshipRepository->update($input, $id);

        Flash::success('University Scholarship updated successfully.');

        return redirect(route('university-scholarships.index'));
    }

    /**
     * Remove the specified UniversityScholarship from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $universityScholarship = $this->universityScholarshipRepository->find($id);

        if (empty($universityScholarship)) {
            Flash::error('University Scholarship not found');

            return redirect(route('university-scholarships.index'));
        }

        $this->universityScholarshipRepository->delete($id);

        Flash::success('University Scholarship deleted successfully.');

        return redirect(route('university-scholarships.index'));
    }
}
