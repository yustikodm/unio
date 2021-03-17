<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLogBintangAPIRequest;
use App\Http\Requests\API\UpdateLogBintangAPIRequest;
use App\Models\LogBintang;
use App\Repositories\LogBintangRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LogBintangController
 * @package App\Http\Controllers\API
 */

class LogBintangAPIController extends AppBaseController
{
    /** @var  LogBintangRepository */
    private $logBintangRepository;

    public function __construct(LogBintangRepository $logBintangRepo)
    {
        $this->logBintangRepository = $logBintangRepo;
    }

    /**
     * Display a listing of the LogBintang.
     * GET|HEAD /logBintang
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $logBintang = $this->logBintangRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($logBintang->toArray(), 'Log Bintang retrieved successfully');
    }

    /**
     * Store a newly created LogBintang in storage.
     * POST /logBintang
     *
     * @param CreateLogBintangAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLogBintangAPIRequest $request)
    {
        $input = $request->all();

        $logBintang = $this->logBintangRepository->create($input);

        return $this->sendResponse($logBintang->toArray(), 'Log Bintang saved successfully');
    }

    /**
     * Display the specified LogBintang.
     * GET|HEAD /logBintang/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var LogBintang $logBintang */
        $logBintang = $this->logBintangRepository->find($id);

        if (empty($logBintang)) {
            return $this->sendError('Log Bintang not found');
        }

        return $this->sendResponse($logBintang->toArray(), 'Log Bintang retrieved successfully');
    }

    /**
     * Update the specified LogBintang in storage.
     * PUT/PATCH /logBintang/{id}
     *
     * @param int $id
     * @param UpdateLogBintangAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLogBintangAPIRequest $request)
    {
        $input = $request->all();

        /** @var LogBintang $logBintang */
        $logBintang = $this->logBintangRepository->find($id);

        if (empty($logBintang)) {
            return $this->sendError('Log Bintang not found');
        }

        $logBintang = $this->logBintangRepository->update($input, $id);

        return $this->sendResponse($logBintang->toArray(), 'LogBintang updated successfully');
    }

    /**
     * Remove the specified LogBintang from storage.
     * DELETE /logBintang/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var LogBintang $logBintang */
        $logBintang = $this->logBintangRepository->find($id);

        if (empty($logBintang)) {
            return $this->sendError('Log Bintang not found');
        }

        $logBintang->delete();

        return $this->sendSuccess('Log Bintang deleted successfully');
    }
}
