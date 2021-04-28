<?php

namespace App\Http\Controllers;

use App\DataTables\UniversityFacilityDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Repositories\UniversityFacilityRepository;
use Laracasts\Flash\Flash;

class UniversityFacilitiesController extends AppBaseController
{
    /** @var  UniversityFacilityRepository */
    private $universityFacilityRepository;

    public function __construct(UniversityFacilityRepository $universityFacilityRepo)
    {
        $this->universityFacilityRepository = $universityFacilityRepo;
    }

    /**
     * Display a listing of the University.
     *
     * @param UniversityFacilityDataTable $universityFacilityDataTable
    
     */
    public function index(UniversityFacilityDataTable $universityFacilityDataTable)
    {
        return $universityFacilityDataTable->render('university_facilities.index');
    }

    /**
     * Show the form for creating a new University.
     *
    
     */
    public function create()
    {
        return view('university_facilities.create');
    }

    /**
     * Store a newly created University in storage.
     *
     * @param CreateUniversityRequest $request
     *
    
     */
    public function store(CreateUniversityRequest $request)
    {
        $input = $request->only([
            'university_id', 
            'name', 
            'description', 
            'amount',
            'picture'
        ]);

        $this->universityFacilityRepository->save($input);

        Flash::success('University saved successfully.');

        return redirect(route('university_facilities.index'));
    }

    /**
     * Display the specified University.
     *
     * @param  int $id
     *
    
     */
    public function show($id)
    {
        $university = $this->universityFacilityRepository->find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('university_facilities.index'));
        }

        return view('university_facilities.show')->with('universityFacility', $university);
    }

    /**
     * Show the form for editing the specified University.
     *
     * @param  int $id
     *
    
     */
    public function edit($id)
    {
        $university = $this->universityFacilityRepository->find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('universities.index'));
        }

        return view('universities.edit')->with('university', $university);
    }

    /**
     * Update the specified University in storage.
     *
     * @param  int              $id
     * @param UpdateUniversityRequest $request
     *
    
     */
    public function update($id, UpdateUniversityRequest $request)
    {
        $university = $this->universityFacilityRepository->find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('universities.index'));
        }

        $input = $request->only([
            'university_id', 
            'name', 
            'description', 
            'amount',
            'picture'
        ]);

        $this->universityFacilityRepository->save($input, $id);

        Flash::success('University updated successfully.');

        return redirect(route('universities.index'));
    }

    /**
     * Remove the specified University from storage.
     *
     * @param  int $id
     *
    
     */
    public function destroy($id)
    {
        $university = $this->universityFacilityRepository->find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('universities.index'));
        }

        $this->universityFacilityRepository->delete($id);

        Flash::success('University deleted successfully.');

        return redirect(route('universities.index'));
    }
}
