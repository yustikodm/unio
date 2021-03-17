<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUniversityFacultiesAPIRequest;
use App\Http\Requests\API\UpdateUniversityFacultiesAPIRequest;
use App\Models\UniversityFaculties;
use App\Repositories\UniversityFacultiesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UniversityFacultiesResource;
use Response;

/**
 * Class UniversityFacultiesController
 * @package App\Http\Controllers\API
 */

class UniversityFacultiesAPIController extends AppBaseController
{
    /** @var  UniversityFacultiesRepository */
    private $universityFacultiesRepository;

    public function __construct(UniversityFacultiesRepository $universityFacultiesRepo)
    {
        $this->universityFacultiesRepository = $universityFacultiesRepo;
    }

    /**
     * Display a listing of the UniversityFaculties.
     * GET|HEAD /universityFaculties
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $universityFaculties = $this->universityFacultiesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(UniversityFacultiesResource::collection($universityFaculties), 'University Faculties retrieved successfully');
    }

    /**
     * Store a newly created UniversityFaculties in storage.
     * POST /universityFaculties
     *
     * @param CreateUniversityFacultiesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUniversityFacultiesAPIRequest $request)
    {
        $input = $request->all();

        $universityFaculties = $this->universityFacultiesRepository->create($input);

        return $this->sendResponse(new UniversityFacultiesResource($universityFaculties), 'University Faculties saved successfully');
    }

    /**
     * Display the specified UniversityFaculties.
     * GET|HEAD /universityFaculties/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UniversityFaculties $universityFaculties */
        $universityFaculties = $this->universityFacultiesRepository->find($id);

        if (empty($universityFaculties)) {
            return $this->sendError('University Faculties not found');
        }

        return $this->sendResponse(new UniversityFacultiesResource($universityFaculties), 'University Faculties retrieved successfully');
    }

    /**
     * Update the specified UniversityFaculties in storage.
     * PUT/PATCH /universityFaculties/{id}
     *
     * @param int $id
     * @param UpdateUniversityFacultiesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUniversityFacultiesAPIRequest $request)
    {
        $input = $request->all();

        /** @var UniversityFaculties $universityFaculties */
        $universityFaculties = $this->universityFacultiesRepository->find($id);

        if (empty($universityFaculties)) {
            return $this->sendError('University Faculties not found');
        }

        $universityFaculties = $this->universityFacultiesRepository->update($input, $id);

        return $this->sendResponse(new UniversityFacultiesResource($universityFaculties), 'UniversityFaculties updated successfully');
    }

    /**
     * Remove the specified UniversityFaculties from storage.
     * DELETE /universityFaculties/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UniversityFaculties $universityFaculties */
        $universityFaculties = $this->universityFacultiesRepository->find($id);

        if (empty($universityFaculties)) {
            return $this->sendError('University Faculties not found');
        }

        $universityFaculties->delete();

        return $this->sendSuccess('University Faculties deleted successfully');
    }
}
