<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLogKlaimBonusAPIRequest;
use App\Http\Requests\API\UpdateLogKlaimBonusAPIRequest;
use App\Models\LogKlaimBonus;
use App\Repositories\LogKlaimBonusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LogKlaimBonusController
 * @package App\Http\Controllers\API
 */

class LogKlaimBonusAPIController extends AppBaseController
{
    /** @var  LogKlaimBonusRepository */
    private $logKlaimBonusRepository;

    public function __construct(LogKlaimBonusRepository $logKlaimBonusRepo)
    {
        $this->logKlaimBonusRepository = $logKlaimBonusRepo;
    }

    /**
     * Display a listing of the LogKlaimBonus.
     * GET|HEAD /logKlaimBonus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $logKlaimBonus = $this->logKlaimBonusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($logKlaimBonus->toArray(), 'Log Klaim Bonus retrieved successfully');
    }

    /**
     * Store a newly created LogKlaimBonus in storage.
     * POST /logKlaimBonus
     *
     * @param CreateLogKlaimBonusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLogKlaimBonusAPIRequest $request)
    {
        $input = $request->all();

        $logKlaimBonus = $this->logKlaimBonusRepository->create($input);

        return $this->sendResponse($logKlaimBonus->toArray(), 'Log Klaim Bonus saved successfully');
    }

    /**
     * Display the specified LogKlaimBonus.
     * GET|HEAD /logKlaimBonus/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LogKlaimBonus $logKlaimBonus */
        $logKlaimBonus = $this->logKlaimBonusRepository->find($id);

        if (empty($logKlaimBonus)) {
            return $this->sendError('Log Klaim Bonus not found');
        }

        return $this->sendResponse($logKlaimBonus->toArray(), 'Log Klaim Bonus retrieved successfully');
    }

    /**
     * Update the specified LogKlaimBonus in storage.
     * PUT/PATCH /logKlaimBonus/{id}
     *
     * @param int $id
     * @param UpdateLogKlaimBonusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogKlaimBonusAPIRequest $request)
    {
        $input = $request->all();

        /** @var LogKlaimBonus $logKlaimBonus */
        $logKlaimBonus = $this->logKlaimBonusRepository->find($id);

        if (empty($logKlaimBonus)) {
            return $this->sendError('Log Klaim Bonus not found');
        }

        $logKlaimBonus = $this->logKlaimBonusRepository->update($input, $id);

        return $this->sendResponse($logKlaimBonus->toArray(), 'LogKlaimBonus updated successfully');
    }

    /**
     * Remove the specified LogKlaimBonus from storage.
     * DELETE /logKlaimBonus/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LogKlaimBonus $logKlaimBonus */
        $logKlaimBonus = $this->logKlaimBonusRepository->find($id);

        if (empty($logKlaimBonus)) {
            return $this->sendError('Log Klaim Bonus not found');
        }

        $logKlaimBonus->delete();

        return $this->sendSuccess('Log Klaim Bonus deleted successfully');
    }
}
