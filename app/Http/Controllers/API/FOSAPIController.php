<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFOSAPIRequest;
use App\Http\Requests\API\UpdateFOSAPIRequest;
use App\Models\FOS;
use App\Repositories\FOSRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FOSResource;
use Response;

/**
 * Class FOSController
 * @package App\Http\Controllers\API
 */

class FOSAPIController extends AppBaseController
{
    /** @var  FOSRepository */
    private $fOSRepository;

    public function __construct(FOSRepository $fOSRepo)
    {
        $this->fOSRepository = $fOSRepo;
    }

    /**
     * Display a listing of the FOS.
     * GET|HEAD /fOS
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $fOS = $this->fOSRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FOSResource::collection($fOS), 'F O S retrieved successfully');
    }

    /**
     * Store a newly created FOS in storage.
     * POST /fOS
     *
     * @param CreateFOSAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFOSAPIRequest $request)
    {
        $input = $request->all();

        $fOS = $this->fOSRepository->create($input);

        return $this->sendResponse(new FOSResource($fOS), 'F O S saved successfully');
    }

    /**
     * Display the specified FOS.
     * GET|HEAD /fOS/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FOS $fOS */
        $fOS = $this->fOSRepository->find($id);

        if (empty($fOS)) {
            return $this->sendError('F O S not found');
        }

        return $this->sendResponse(new FOSResource($fOS), 'F O S retrieved successfully');
    }

    /**
     * Update the specified FOS in storage.
     * PUT/PATCH /fOS/{id}
     *
     * @param int $id
     * @param UpdateFOSAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFOSAPIRequest $request)
    {
        $input = $request->all();

        /** @var FOS $fOS */
        $fOS = $this->fOSRepository->find($id);

        if (empty($fOS)) {
            return $this->sendError('F O S not found');
        }

        $fOS = $this->fOSRepository->update($input, $id);

        return $this->sendResponse(new FOSResource($fOS), 'FOS updated successfully');
    }

    /**
     * Remove the specified FOS from storage.
     * DELETE /fOS/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FOS $fOS */
        $fOS = $this->fOSRepository->find($id);

        if (empty($fOS)) {
            return $this->sendError('F O S not found');
        }

        $fOS->delete();

        return $this->sendSuccess('F O S deleted successfully');
    }
}
