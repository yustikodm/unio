<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateParameterAPIRequest;
use App\Http\Requests\API\UpdateParameterAPIRequest;
use App\Models\Parameter;
use App\Repositories\ParameterRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ParameterController
 * @package App\Http\Controllers\API
 */

class ParameterAPIController extends AppBaseController
{
    /** @var  ParameterRepository */
    private $parameterRepository;

    public function __construct(ParameterRepository $parameterRepo)
    {
        $this->parameterRepository = $parameterRepo;
    }

    /**
     * Display a listing of the Parameter.
     * GET|HEAD /parameter
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $parameter = $this->parameterRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($parameter->toArray(), 'Parameter retrieved successfully');
    }

    /**
     * Store a newly created Parameter in storage.
     * POST /parameter
     *
     * @param CreateParameterAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateParameterAPIRequest $request)
    {
        $input = $request->all();

        $parameter = $this->parameterRepository->create($input);

        return $this->sendResponse($parameter->toArray(), 'Parameter saved successfully');
    }

    /**
     * Display the specified Parameter.
     * GET|HEAD /parameter/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Parameter $parameter */
        $parameter = $this->parameterRepository->find($id);

        if (empty($parameter)) {
            return $this->sendError('Parameter not found');
        }

        return $this->sendResponse($parameter->toArray(), 'Parameter retrieved successfully');
    }

    /**
     * Update the specified Parameter in storage.
     * PUT/PATCH /parameter/{id}
     *
     * @param int $id
     * @param UpdateParameterAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParameterAPIRequest $request)
    {
        $input = $request->all();

        /** @var Parameter $parameter */
        $parameter = $this->parameterRepository->find($id);

        if (empty($parameter)) {
            return $this->sendError('Parameter not found');
        }

        $parameter = $this->parameterRepository->update($input, $id);

        return $this->sendResponse($parameter->toArray(), 'Parameter updated successfully');
    }

    /**
     * Remove the specified Parameter from storage.
     * DELETE /parameter/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Parameter $parameter */
        $parameter = $this->parameterRepository->find($id);

        if (empty($parameter)) {
            return $this->sendError('Parameter not found');
        }

        $parameter->delete();

        return $this->sendSuccess('Parameter deleted successfully');
    }

    public function getDiskonMitra($param)
    {
        $parameter = $this->parameterRepository->all(['key' => $param]);

        return $this->sendResponse($parameter->toArray(), 'Parameter retrieved successfully');
    }
}
