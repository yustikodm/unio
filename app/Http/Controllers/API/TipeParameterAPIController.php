<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipeParameterAPIRequest;
use App\Http\Requests\API\UpdateTipeParameterAPIRequest;
use App\Models\TipeParameter;
use App\Repositories\TipeParameterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TipeParameterController
 * @package App\Http\Controllers\API
 */

class TipeParameterAPIController extends AppBaseController
{
    /** @var  TipeParameterRepository */
    private $tipeParameterRepository;

    public function __construct(TipeParameterRepository $tipeParameterRepo)
    {
        $this->tipeParameterRepository = $tipeParameterRepo;
    }

    /**
     * Display a listing of the TipeParameter.
     * GET|HEAD /tipeParameter
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $tipeParameter = $this->tipeParameterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipeParameter->toArray(), 'Tipe Parameter retrieved successfully');
    }

    /**
     * Store a newly created TipeParameter in storage.
     * POST /tipeParameter
     *
     * @param CreateTipeParameterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTipeParameterAPIRequest $request)
    {
        $input = $request->all();

        $tipeParameter = $this->tipeParameterRepository->create($input);

        return $this->sendResponse($tipeParameter->toArray(), 'Tipe Parameter saved successfully');
    }

    /**
     * Display the specified TipeParameter.
     * GET|HEAD /tipeParameter/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TipeParameter $tipeParameter */
        $tipeParameter = $this->tipeParameterRepository->find($id);

        if (empty($tipeParameter)) {
            return $this->sendError('Tipe Parameter not found');
        }

        return $this->sendResponse($tipeParameter->toArray(), 'Tipe Parameter retrieved successfully');
    }

    /**
     * Update the specified TipeParameter in storage.
     * PUT/PATCH /tipeParameter/{id}
     *
     * @param int $id
     * @param UpdateTipeParameterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTipeParameterAPIRequest $request)
    {
        $input = $request->all();

        /** @var TipeParameter $tipeParameter */
        $tipeParameter = $this->tipeParameterRepository->find($id);

        if (empty($tipeParameter)) {
            return $this->sendError('Tipe Parameter not found');
        }

        $tipeParameter = $this->tipeParameterRepository->update($input, $id);

        return $this->sendResponse($tipeParameter->toArray(), 'TipeParameter updated successfully');
    }

    /**
     * Remove the specified TipeParameter from storage.
     * DELETE /tipeParameter/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TipeParameter $tipeParameter */
        $tipeParameter = $this->tipeParameterRepository->find($id);

        if (empty($tipeParameter)) {
            return $this->sendError('Tipe Parameter not found');
        }

        $tipeParameter->delete();

        return $this->sendSuccess('Tipe Parameter deleted successfully');
    }
}
