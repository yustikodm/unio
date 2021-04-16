<?php

namespace App\Http\Controllers;

use App\DataTables\UniversityMajorDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUniversityMajorRequest;
use App\Http\Requests\UpdateUniversityMajorRequest;
use App\Repositories\UniversityMajorRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UniversityMajorController extends AppBaseController
{
    /** @var  UniversityMajorRepository */
    private $universityMajorRepository;

    public function __construct(UniversityMajorRepository $universityMajorRepo)
    {
        $this->universityMajorRepository = $universityMajorRepo;
    }

    /**
     * Display a listing of the UniversityMajor.
     *
     * @param UniversityMajorDataTable $universityMajorDataTable
     * @return Response
     */
    public function index(UniversityMajorDataTable $universityMajorDataTable)
    {
        return $universityMajorDataTable->render('university_majors.index');
    }

    /**
     * Show the form for creating a new UniversityMajor.
     *
     * @return Response
     */
    public function create()
    {
        return view('university_majors.create');
    }

    /**
     * Store a newly created UniversityMajor in storage.
     *
     * @param CreateUniversityMajorRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityMajorRequest $request)
    {
        $input = $request->only([
          'university_id',
          'faculty_id',
          'name',
          'level',
          'accreditation',
          'description'
        ]);

        $this->universityMajorRepository->store($input);

        Flash::success('University Major saved successfully.');

        return redirect(route('university-majors.index'));
    }

    /**
     * Display the specified UniversityMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $universityMajor = $this->universityMajorRepository->find($id);

        if (empty($universityMajor)) {
            Flash::error('University Major not found');

            return redirect(route('university-majors.index'));
        }

        return view('university_majors.show')->with('universityMajor', $universityMajor);
    }

    /**
     * Show the form for editing the specified UniversityMajor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $universityMajor = $this->universityMajorRepository->find($id);

        if (empty($universityMajor)) {
            Flash::error('University Major not found');

            return redirect(route('university-majors.index'));
        }

        return view('university_majors.edit')->with('universityMajor', $universityMajor);
    }

    /**
     * Update the specified UniversityMajor in storage.
     *
     * @param  int              $id
     * @param UpdateUniversityMajorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityMajorRequest $request)
    {
        $universityMajor = $this->universityMajorRepository->find($id);

        if (empty($universityMajor)) {
            Flash::error('University Major not found');

            return redirect(route('university-majors.index'));
        }

        $input = $request->only([
          'university_id',
          'faculty_id',
          'name',
          'level',
          'accreditation',
          'description'
        ]);

        $universityMajor = $this->universityMajorRepository->update($id, $input);

        Flash::success('University Major updated successfully.');

        return redirect(route('university-majors.index'));
    }

    /**
     * Remove the specified UniversityMajor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $universityMajor = $this->universityMajorRepository->find($id);

        if (empty($universityMajor)) {
            Flash::error('University Major not found');

            return redirect(route('university-majors.index'));
        }

        $this->universityMajorRepository->delete($id);

        Flash::success('University Major deleted successfully.');

        return redirect(route('university-majors.index'));
    }
}
