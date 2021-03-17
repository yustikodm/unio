<?php

namespace App\Http\Controllers;

use App\DataTables\UniversityFacultiesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUniversityFacultiesRequest;
use App\Http\Requests\UpdateUniversityFacultiesRequest;
use App\Repositories\UniversityFacultiesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UniversityFacultiesController extends AppBaseController
{
    /** @var  UniversityFacultiesRepository */
    private $universityFacultiesRepository;

    public function __construct(UniversityFacultiesRepository $universityFacultiesRepo)
    {
        $this->universityFacultiesRepository = $universityFacultiesRepo;
    }

    /**
     * Display a listing of the UniversityFaculties.
     *
     * @param UniversityFacultiesDataTable $universityFacultiesDataTable
     * @return Response
     */
    public function index(UniversityFacultiesDataTable $universityFacultiesDataTable)
    {
        return $universityFacultiesDataTable->render('university_faculties.index');
    }

    /**
     * Show the form for creating a new UniversityFaculties.
     *
     * @return Response
     */
    public function create()
    {
        return view('university_faculties.create');
    }

    /**
     * Store a newly created UniversityFaculties in storage.
     *
     * @param CreateUniversityFacultiesRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityFacultiesRequest $request)
    {
        $input = $request->all();

        $universityFaculties = $this->universityFacultiesRepository->create($input);

        Flash::success('University Faculties saved successfully.');

        return redirect(route('universityFaculties.index'));
    }

    /**
     * Display the specified UniversityFaculties.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $universityFaculties = $this->universityFacultiesRepository->find($id);

        if (empty($universityFaculties)) {
            Flash::error('University Faculties not found');

            return redirect(route('universityFaculties.index'));
        }

        return view('university_faculties.show')->with('universityFaculties', $universityFaculties);
    }

    /**
     * Show the form for editing the specified UniversityFaculties.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $universityFaculties = $this->universityFacultiesRepository->find($id);

        if (empty($universityFaculties)) {
            Flash::error('University Faculties not found');

            return redirect(route('universityFaculties.index'));
        }

        return view('university_faculties.edit')->with('universityFaculties', $universityFaculties);
    }

    /**
     * Update the specified UniversityFaculties in storage.
     *
     * @param  int              $id
     * @param UpdateUniversityFacultiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityFacultiesRequest $request)
    {
        $universityFaculties = $this->universityFacultiesRepository->find($id);

        if (empty($universityFaculties)) {
            Flash::error('University Faculties not found');

            return redirect(route('universityFaculties.index'));
        }

        $universityFaculties = $this->universityFacultiesRepository->update($request->all(), $id);

        Flash::success('University Faculties updated successfully.');

        return redirect(route('universityFaculties.index'));
    }

    /**
     * Remove the specified UniversityFaculties from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $universityFaculties = $this->universityFacultiesRepository->find($id);

        if (empty($universityFaculties)) {
            Flash::error('University Faculties not found');

            return redirect(route('universityFaculties.index'));
        }

        $this->universityFacultiesRepository->delete($id);

        Flash::success('University Faculties deleted successfully.');

        return redirect(route('universityFaculties.index'));
    }
}
