<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLogPoinAPIRequest;
use App\Http\Requests\API\UpdateLogPoinAPIRequest;
use App\Models\LogPoin;
use App\Repositories\LogPoinRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LogPoinController
 * @package App\Http\Controllers\API
 */

class LogPoinAPIController extends AppBaseController
{
    /** @var  LogPoinRepository */
    private $logPoinRepository;

    public function __construct(LogPoinRepository $logPoinRepo)
    {
        $this->logPoinRepository = $logPoinRepo;
    }

    /**
     * Display a listing of the LogPoin.
     * GET|HEAD /logPoin
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $logPoin = $this->logPoinRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($logPoin->toArray(), 'Log Poin retrieved successfully');
    }

    /**
     * Store a newly created LogPoin in storage.
     * POST /logPoin
     *
     * @param CreateLogPoinAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLogPoinAPIRequest $request)
    {
        $input = $request->all();

        $logPoin = $this->logPoinRepository->create($input);

        return $this->sendResponse($logPoin->toArray(), 'Log Poin saved successfully');
    }

    /**
     * Display the specified LogPoin.
     * GET|HEAD /logPoin/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LogPoin $logPoin */
        $logPoin = $this->logPoinRepository->find($id);

        if (empty($logPoin)) {
            return $this->sendError('Log Poin not found');
        }

        return $this->sendResponse($logPoin->toArray(), 'Log Poin retrieved successfully');
    }

    /**
     * Update the specified LogPoin in storage.
     * PUT/PATCH /logPoin/{id}
     *
     * @param int $id
     * @param UpdateLogPoinAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogPoinAPIRequest $request)
    {
        $input = $request->all();

        /** @var LogPoin $logPoin */
        $logPoin = $this->logPoinRepository->find($id);

        if (empty($logPoin)) {
            return $this->sendError('Log Poin not found');
        }

        $logPoin = $this->logPoinRepository->update($input, $id);

        return $this->sendResponse($logPoin->toArray(), 'LogPoin updated successfully');
    }

    /**
     * Remove the specified LogPoin from storage.
     * DELETE /logPoin/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LogPoin $logPoin */
        $logPoin = $this->logPoinRepository->find($id);

        if (empty($logPoin)) {
            return $this->sendError('Log Poin not found');
        }

        $logPoin->delete();

        return $this->sendSuccess('Log Poin deleted successfully');
    }
}
