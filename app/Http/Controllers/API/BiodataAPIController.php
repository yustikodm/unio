<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBiodataAPIRequest;
use App\Http\Requests\API\UpdateBiodataAPIRequest;
use App\Models\Biodata;
use App\Repositories\BiodataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\BiodataResource;
use Response;

/**
 * Class BiodataController
 * @package App\Http\Controllers\API
 */

class BiodataAPIController extends AppBaseController
{
    /** @var  BiodataRepository */
    private $biodataRepository;

    public function __construct(BiodataRepository $biodataRepo)
    {
        $this->biodataRepository = $biodataRepo;
    }

    /**
     * Display a listing of the Biodata.
     * GET|HEAD /biodatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $biodatas = $this->biodataRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(BiodataResource::collection($biodatas), 'Biodatas retrieved successfully');
    }

    /**
     * Store a newly created Biodata in storage.
     * POST /biodatas
     *
     * @param CreateBiodataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBiodataAPIRequest $request)
    {
        $input = $request->all();

        $biodata = $this->biodataRepository->create($input);

        return $this->sendResponse(new BiodataResource($biodata), 'Biodata saved successfully');
    }

    /**
     * Display the specified Biodata.
     * GET|HEAD /biodatas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Biodata $biodata */
        $biodata = $this->biodataRepository->find($id);

        if (empty($biodata)) {
            return $this->sendError('Biodata not found');
        }

        return $this->sendResponse(new BiodataResource($biodata), 'Biodata retrieved successfully');
    }

    /**
     * Update the specified Biodata in storage.
     * PUT/PATCH /biodatas/{id}
     *
     * @param int $id
     * @param UpdateBiodataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBiodataAPIRequest $request)
    {
        $input = $request->all();

        /** @var Biodata $biodata */
        $biodata = $this->biodataRepository->find($id);

        if (empty($biodata)) {
            return $this->sendError('Biodata not found');
        }

        $biodata = $this->biodataRepository->update($input, $id);

        return $this->sendResponse(new BiodataResource($biodata), 'Biodata updated successfully');
    }

    /**
     * Remove the specified Biodata from storage.
     * DELETE /biodatas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Biodata $biodata */
        $biodata = $this->biodataRepository->find($id);

        if (empty($biodata)) {
            return $this->sendError('Biodata not found');
        }

        $biodata->delete();

        return $this->sendSuccess('Biodata deleted successfully');
    }
}
