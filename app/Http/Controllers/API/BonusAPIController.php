<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBonusAPIRequest;
use App\Http\Requests\API\UpdateBonusAPIRequest;
use App\Models\Bonus;
use App\Repositories\BonusRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class BonusController
 * @package App\Http\Controllers\API
 */

class BonusAPIController extends AppBaseController
{
    /** @var  BonusRepository */
    private $bonusRepository;

    public function __construct(BonusRepository $bonusRepo)
    {
        $this->bonusRepository = $bonusRepo;
    }

    /**
     * Display a listing of the Bonus.
     * GET|HEAD /bonus
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $bonus = $this->bonusRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($bonus->toArray(), 'Bonus retrieved successfully');
    }

    /**
     * Store a newly created Bonus in storage.
     * POST /bonus
     *
     * @param CreateBonusAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBonusAPIRequest $request)
    {
        $input = $request->all();

        $bonus = $this->bonusRepository->create($input);

        return $this->sendResponse($bonus->toArray(), 'Bonus saved successfully');
    }

    /**
     * Display the specified Bonus.
     * GET|HEAD /bonus/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bonus $bonus */
        $bonus = $this->bonusRepository->find($id);

        if (empty($bonus)) {
            return $this->sendError('Bonus not found');
        }

        return $this->sendResponse($bonus->toArray(), 'Bonus retrieved successfully');
    }

    /**
     * Update the specified Bonus in storage.
     * PUT/PATCH /bonus/{id}
     *
     * @param int $id
     * @param UpdateBonusAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBonusAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bonus $bonus */
        $bonus = $this->bonusRepository->find($id);

        if (empty($bonus)) {
            return $this->sendError('Bonus not found');
        }

        $bonus = $this->bonusRepository->update($input, $id);

        return $this->sendResponse($bonus->toArray(), 'Bonus updated successfully');
    }

    /**
     * Remove the specified Bonus from storage.
     * DELETE /bonus/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bonus $bonus */
        $bonus = $this->bonusRepository->find($id);

        if (empty($bonus)) {
            return $this->sendError('Bonus not found');
        }

        $bonus->delete();

        return $this->sendSuccess('Bonus deleted successfully');
    }
}
