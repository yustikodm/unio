<?php

namespace App\Http\Controllers;

use App\DataTables\UniversityDataTable;
use App\Http\Requests\CreateUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Repositories\UniversityRepository;
use Laracasts\Flash\Flash;
use App\Http\Controllers\AppBaseController;

class UniversityController extends AppBaseController
{
    /** @var  UniversityRepository */
    private $universityRepository;

    public function __construct(UniversityRepository $universityRepo)
    {
        $this->universityRepository = $universityRepo;
    }

    /**
     * Display a listing of the University.
     *
     * @param UniversityDataTable $universityDataTable
    
     */
    public function index(UniversityDataTable $universityDataTable)
    {
        return $universityDataTable->render('universities.index');
    }

    /**
     * Show the form for creating a new University.
     *
    
     */
    public function create()
    {
        return view('universities.create');
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
            'country_id',
            'state_id',
            'district_id',
            'code',
            'name',
            'description',
            'logo_src',
            'header_src',
            'type',
            'website',
            'email',
            'accreditation',
            'address'
        ]);

        $this->universityRepository->save($input);

        Flash::success('University saved successfully.');

        return redirect(route('universities.index'));
    }

    /**
     * Display the specified University.
     *
     * @param  int $id
     *
    
     */
    public function show($id)
    {
        $university = $this->universityRepository->find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('universities.index'));
        }

        return view('universities.show')->with('university', $university);
    }

    /**
     * Show the form for editing the specified University.
     *
     * @param  int $id
     *
    
     */
    public function edit($id)
    {
        $university = $this->universityRepository->find($id);

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
        $university = $this->universityRepository->find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('universities.index'));
        }

        $input = $request->only([
            'country_id',
            'state_id',
            'district_id',
            'code',
            'name',
            'description',
            'logo_src',
            'header_src',
            'type',
            'website',
            'email',
            'accreditation',
            'address'
        ]);

        $this->universityRepository->save($input, $id);

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
        $university = $this->universityRepository->find($id);

        if (empty($university)) {
            Flash::error('University not found');

            return redirect(route('universities.index'));
        }

        $this->universityRepository->delete($id);

        Flash::success('University deleted successfully.');

        return redirect(route('universities.index'));
    }
}
