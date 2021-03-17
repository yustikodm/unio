<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiskonAPIRequest;
use App\Http\Requests\API\UpdateDiskonAPIRequest;
use App\Models\Diskon;
use App\Repositories\DiskonRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DiskonController
 * @package App\Http\Controllers\API
 */

class DiskonAPIController extends AppBaseController
{
    /** @var  DiskonRepository */
    private $diskonRepository;

    public function __construct(DiskonRepository $diskonRepo)
    {
        $this->diskonRepository = $diskonRepo;
    }

    /**
     * Display a listing of the Diskon.
     * GET|HEAD /diskon
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $diskon = $this->diskonRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($diskon->toArray(), 'Diskon retrieved successfully');
    }

    /**
     * Store a newly created Diskon in storage.
     * POST /diskon
     *
     * @param CreateDiskonAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDiskonAPIRequest $request)
    {
        $input = $request->all();

        $diskon = $this->diskonRepository->create($input);

        return $this->sendResponse($diskon->toArray(), 'Diskon saved successfully');
    }

    /**
     * Display the specified Diskon.
     * GET|HEAD /diskon/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Diskon $diskon */
        $diskon = $this->diskonRepository->find($id);

        if (empty($diskon)) {
            return $this->sendError('Diskon not found');
        }

        return $this->sendResponse($diskon->toArray(), 'Diskon retrieved successfully');
    }

    /**
     * Update the specified Diskon in storage.
     * PUT/PATCH /diskon/{id}
     *
     * @param int $id
     * @param UpdateDiskonAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiskonAPIRequest $request)
    {
        $input = $request->all();

        /** @var Diskon $diskon */
        $diskon = $this->diskonRepository->find($id);

        if (empty($diskon)) {
            return $this->sendError('Diskon not found');
        }

        $diskon = $this->diskonRepository->update($input, $id);

        return $this->sendResponse($diskon->toArray(), 'Diskon updated successfully');
    }

    /**
     * Remove the specified Diskon from storage.
     * DELETE /diskon/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Diskon $diskon */
        $diskon = $this->diskonRepository->find($id);

        if (empty($diskon)) {
            return $this->sendError('Diskon not found');
        }

        $diskon->delete();

        return $this->sendSuccess('Diskon deleted successfully');
    }
}
