<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLogBonusAPIRequest;
use App\Http\Requests\API\UpdateLogBonusAPIRequest;
use App\Models\LogBonus;
use App\Repositories\LogBonusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LogBonusController
 * @package App\Http\Controllers\API
 */

class LogBonusAPIController extends AppBaseController
{
    /** @var  LogBonusRepository */
    private $logBonusRepository;

    public function __construct(LogBonusRepository $logBonusRepo)
    {
        $this->logBonusRepository = $logBonusRepo;
    }

    /**
     * Display a listing of the LogBonus.
     * GET|HEAD /logBonus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $logBonus = $this->logBonusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($logBonus->toArray(), 'Log Bonus retrieved successfully');
    }

    /**
     * Store a newly created LogBonus in storage.
     * POST /logBonus
     *
     * @param CreateLogBonusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLogBonusAPIRequest $request)
    {
        $input = $request->all();

        $logBonus = $this->logBonusRepository->create($input);

        return $this->sendResponse($logBonus->toArray(), 'Log Bonus saved successfully');
    }

    /**
     * Display the specified LogBonus.
     * GET|HEAD /logBonus/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LogBonus $logBonus */
        $logBonus = $this->logBonusRepository->find($id);

        if (empty($logBonus)) {
            return $this->sendError('Log Bonus not found');
        }

        return $this->sendResponse($logBonus->toArray(), 'Log Bonus retrieved successfully');
    }

    /**
     * Update the specified LogBonus in storage.
     * PUT/PATCH /logBonus/{id}
     *
     * @param int $id
     * @param UpdateLogBonusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogBonusAPIRequest $request)
    {
        $input = $request->all();

        /** @var LogBonus $logBonus */
        $logBonus = $this->logBonusRepository->find($id);

        if (empty($logBonus)) {
            return $this->sendError('Log Bonus not found');
        }

        $logBonus = $this->logBonusRepository->update($input, $id);

        return $this->sendResponse($logBonus->toArray(), 'LogBonus updated successfully');
    }

    /**
     * Remove the specified LogBonus from storage.
     * DELETE /logBonus/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LogBonus $logBonus */
        $logBonus = $this->logBonusRepository->find($id);

        if (empty($logBonus)) {
            return $this->sendError('Log Bonus not found');
        }

        $logBonus->delete();

        return $this->sendSuccess('Log Bonus deleted successfully');
    }
}
